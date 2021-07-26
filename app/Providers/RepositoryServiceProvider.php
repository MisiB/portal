<?php

namespace App\Providers;

use App\Interfaces\administrator\loginInterface;
use App\Interfaces\administrator\roleInterface;
use App\Interfaces\bankpaymentsInterface;
use App\Interfaces\bankrateInterface;
use App\Interfaces\banktransactionsInterface;
use App\Interfaces\categoryInterface;
use App\Interfaces\currencyInterface;
use App\Interfaces\documensInterface;
use App\Interfaces\internalrateInterface;
use App\Interfaces\mobilepaymentsInterface;
use App\Interfaces\mybidbondInterface;
use App\Interfaces\mytenderfeesInterface;
use App\Interfaces\paynowInterface;
use App\Interfaces\pricingInterface;
use App\Interfaces\profileInterface;
use App\Interfaces\regyearInterface;
use App\Interfaces\rtgsInterface;
use App\Interfaces\sectionInterface;
use App\Interfaces\statementInterface;
use App\Interfaces\suppliers\certificateInterface;
use App\Interfaces\suppliers\receiptsInterface;
use App\Interfaces\suppliers\registrationsInterface;
use App\Interfaces\suppliers\supplier_dashboard_interface;
use App\Interfaces\suppliers\supplier_document_upload_Interface;
use App\Interfaces\suppliers\supplier_invoicing_Interface;
use App\Interfaces\suppliers\usersInterface;
use App\Interfaces\suspenseInterface;
use App\Interfaces\tenderfeePaymentInterface;
use App\Repositories\administrator\loginRepository;
use App\Repositories\administrator\roleRepository;
use App\Repositories\bankpaymentsRepository;
use App\Repositories\bankrateRepository;
use App\Repositories\banktransactionsRepository;
use App\Repositories\categoryRepositoy;
use App\Repositories\currencyRepository;
use App\Repositories\documentRepository;
use App\Repositories\internalrateRepository;
use App\Repositories\mobilepaymentsRepository;
use App\Repositories\mybidbondRepository;
use App\Repositories\mytenderfeesRepository;
use App\Repositories\paynowRepository;
use App\Repositories\pricingRepository;
use App\Repositories\profileRepository;
use App\Repositories\regyearRepository;
use App\Repositories\rtgsRepository;
use App\Repositories\sectionRepository;
use App\Repositories\statementRepository;
use App\Repositories\suppliers\certificateRepository;
use App\Repositories\suppliers\dashboard as supplier_dashboard_repository;
use App\Repositories\suppliers\receiptsRepository;
use App\Repositories\suppliers\registrationsRepository;
use App\Repositories\suppliers\supplier_document_upload_repository;
use App\Repositories\suppliers\supplier_invoicing_Repository;
use App\Repositories\suppliers\usersRepository;
use App\Repositories\suspenseRepository;
use App\Repositories\tenderfeePaymentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind(supplier_dashboard_interface::class,supplier_dashboard_repository::class);
         $this->app->bind(profileInterface::class,profileRepository::class);
         $this->app->bind(documensInterface::class,documentRepository::class);
         $this->app->bind(supplier_document_upload_Interface::class,supplier_document_upload_repository::class);
         $this->app->bind(sectionInterface::class,sectionRepository::class);
         $this->app->bind(categoryInterface::class,categoryRepositoy::class);
         $this->app->bind(pricingInterface::class,pricingRepository::class);
         $this->app->bind(currencyInterface::class,currencyRepository::class);
         $this->app->bind(bankrateInterface::class,bankrateRepository::class);
         $this->app->bind(internalrateInterface::class,internalrateRepository::class);
         $this->app->bind(supplier_invoicing_Interface::class,supplier_invoicing_Repository::class);
         $this->app->bind(regyearInterface::class,regyearRepository::class);
         $this->app->bind(mobilepaymentsInterface::class,mobilepaymentsRepository::class);
         $this->app->bind(registrationsInterface::class,registrationsRepository::class);
         $this->app->bind(paynowInterface::class,paynowRepository::class);
         $this->app->bind(statementInterface::class,statementRepository::class);
         $this->app->bind(banktransactionsInterface::class,banktransactionsRepository::class);
         $this->app->bind(suspenseInterface::class,suspenseRepository::class);
         $this->app->bind(bankpaymentsInterface::class,bankpaymentsRepository::class);
         $this->app->bind(rtgsInterface::class,rtgsRepository::class);
         $this->app->bind(certificateInterface::class,certificateRepository::class);
         $this->app->bind(receiptsInterface::class,receiptsRepository::class);
         $this->app->bind(usersInterface::class,usersRepository::class);
         $this->app->bind(mytenderfeesInterface::class,mytenderfeesRepository::class);
         $this->app->bind(mybidbondInterface::class,mybidbondRepository::class);
         $this->app->bind(tenderfeePaymentInterface::class,tenderfeePaymentRepository::class);
         $this->app->bind(loginInterface::class,loginRepository::class);

         /**
          * administrator entries
          */

          $this->app->bind(roleInterface::class,roleRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
