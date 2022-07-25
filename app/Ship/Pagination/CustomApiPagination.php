<?php

namespace App\Ship\Pagination;


use League\Fractal\Pagination\PaginatorInterface;
use League\Fractal\Serializer\DataArraySerializer;

class CustomApiPagination extends DataArraySerializer
{
    /**
     * {@inheritDoc}
     */
    public function paginator(PaginatorInterface $paginator): array
    {
        $currentPage = $paginator->getCurrentPage();
        $lastPage = $paginator->getLastPage();

        $pagination = [
            'total' => $paginator->getTotal(),
            'count' => $paginator->getCount(),
            'per_page' => $paginator->getPerPage(),
            'current_page' => $currentPage,
            'total_pages' => $lastPage,
        ];

        $pagination['links'] = [];

        if ($currentPage > 1) {
            $pagination['links']['previous'] = $paginator->getUrl($currentPage - 1);
            $pagination['previous_page'] = $currentPage - 1;
        }

        if ($currentPage < $lastPage) {
            $pagination['links']['next'] = $paginator->getUrl($currentPage + 1);
            $pagination['next_page'] = $currentPage + 1;
        }

        if (empty($pagination['links'])) {
            $pagination['links'] = (object) [];
        }

        return ['pagination' => $pagination];
    }
}
