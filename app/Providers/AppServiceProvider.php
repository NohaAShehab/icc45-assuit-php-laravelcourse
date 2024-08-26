<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Student;
use App\Models\User;
use App\Policies\StudentPolicy;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        # create new gate --> update_student ?? student->creator_id === current logged in user id
        Gate::define('update-student', function (User $user, Student $student) {
            return $student->creator_id === $user->id;

        });


        # register policies

        Gate::policy(Student::class, StudentPolicy::class);
    }







}
