<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(): View
    {
        return view('company.index');
    }

    public function show(Company $company): View
    {
        $company_brands = Company::query()
            ->join('brand_company', 'companies.id', '=', 'brand_company.company_id');

//        $address = Company::query()
//            ->where('id', '=', $company->id)
//            ->select('address[city]')
//            ->first();

        $city = $company->address['city'];
        $street = $company->address['street'];
        $home_nr = $company->address['home_nr'];
        $zip_code = $company->address['zip_code'];

        return view('company.show', compact('company', 'company_brands', 'city', 'home_nr', 'street', 'zip_code'));
    }
}
