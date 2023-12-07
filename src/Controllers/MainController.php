<?php

namespace src\Controllers;
use Laminas\Diactoros\Request;
use Laminas\Diactoros\ServerRequest;
use  MiladRahimi\PhpRouter\View\View;
use ORM;

class MainController
{
    public function indexPage(View $view)
    {
        $tour = ORM::forTable('tour')->find_many();
        $review = ORM::forTable('review')->find_many();

        return $view->make('index', [
            'tours'=>$tour,
            'items'=>$review
        ]);
    }
    public function contact(View $view)
    {
        return $view->make('contacts');
    }

    public function grid(View $view)
    {
        $tour = ORM::forTable('tour')->find_many();

        return $view->make('grid', [
            'tours'=>$tour
        ]);
    }

    public function list(View $view)
    {
        return $view->make('list');
    }

    public function detail(View $view, $id)
    {
        $review = ORM::forTable('review')->where('tour_id', $id)->find_many();
        $tour = ORM::forTable('tour')->find_one($id);
        $program = ORM::forTable('program')->where('tour_id', $id)->find_many();

        return $view->make('detail-page', [
            'items'=>$review,
            'tour'=>$tour,
            'programs' => $program
        ]);
    }


}