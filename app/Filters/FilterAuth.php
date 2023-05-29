<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        $isLoggedIn = session('log');

        if (!$isLoggedIn) {
            return redirect()->to(base_url('home'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        $isLoggedIn = session('log');

        if ($isLoggedIn) {
            return redirect()->to(base_url('admin'));
        }
    }
}