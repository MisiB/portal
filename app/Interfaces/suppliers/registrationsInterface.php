<?php
namespace App\Interfaces\suppliers;

use Symfony\Component\HttpFoundation\Request;

interface registrationsInterface{

    public function getByCompany($id);

    public function getCertificate($id,$company);

    public function verify($code);

    public function change(Request $request);
}