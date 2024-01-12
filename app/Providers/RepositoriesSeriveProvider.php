<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\HeadOffice\Configuration\Color\{ColorInterface,ColorRepository};
use App\Repositories\HeadOffice\Branch\{BranchInterface, BranchRepository};
use App\Repositories\HeadOffice\Configuration\City\{CityInterface,CityRepository};
use App\Repositories\HeadOffice\Configuration\Group\{GroupInterface,GroupRepository};
use App\Repositories\HeadOffice\Configuration\State\{StateInterface,StateRepository};
use App\Repositories\HeadOffice\Configuration\Company\{CompanyInterface,CompanyRepository};
use App\Repositories\HeadOffice\Configuration\Country\{CountryInterface,CountryRepository};
use App\Repositories\HeadOffice\Configuration\Category\{CategoryInterface,CategoryRepository};
use App\Repositories\HeadOffice\Configuration\Department\{DepartmentInterface,DepartmentRepository};
use App\Repositories\HeadOffice\Configuration\Designation\{DesignationInterface,DesignationRepository};
use App\Repositories\HeadOffice\Configuration\SubCategory\{SubCategoryInterface,SubCategoryRepository};

class RepositoriesSeriveProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(DepartmentInterface::class, DepartmentRepository::class);
       $this->app->bind(DesignationInterface::class, DesignationRepository::class);
       $this->app->bind(BranchInterface::class, BranchRepository::class);
       $this->app->bind(ColorInterface::class, ColorRepository::class);
       $this->app->bind(CountryInterface::class, CountryRepository::class);
       $this->app->bind(CategoryInterface::class, CategoryRepository::class);
       $this->app->bind(SubCategoryInterface::class, SubCategoryRepository::class);
       $this->app->bind(CompanyInterface::class, CompanyRepository::class);
       $this->app->bind(StateInterface::class, StateRepository::class);
       $this->app->bind(BranchInterface::class, BranchRepository::class);
       $this->app->bind(GroupInterface::class, GroupRepository::class);
       $this->app->bind(CityInterface::class, CityRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
    
}
