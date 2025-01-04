<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterKades implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $currentURI = $request->getUri()->getPath();

        // Allow access to landing page and login routes
        if ($currentURI == '/' || $currentURI == 'login' || $currentURI == 'register') {
            return;
        }
        
        if (session()->get('id_pengguna') == NULL) {
            session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan Login</div>');
            return redirect()->to(base_url('/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('level') == 'Ka. Des') {
            return redirect()->to('/kades');
        }
    }
}
