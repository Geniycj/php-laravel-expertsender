<?php

namespace ExpertSender;

use ExpertSender\ExpertSender;
use ExpertSender\ExpertSenderExamples;
use Illuminate\Support\ServiceProvider;
use ExpertSender\Abstracts\IExpertSender;
use ExpertSender\Validators\AddEventValidator;
use ExpertSender\Validators\GetListsValidator;
use ExpertSender\Packages\HttpClient\HttpClient;
use ExpertSender\Abstracts\IExpertSenderExamples;
use ExpertSender\Packages\HttpClient\IHttpClient;
use ExpertSender\Packages\HttpClient\HttpResponse;
use ExpertSender\Validators\AddDataTableValidator;
use ExpertSender\Packages\HttpClient\IHttpResponse;
use ExpertSender\Validators\DeleteDataTableValidator;
use ExpertSender\Validators\SearchDataTableValidator;
use ExpertSender\Validators\DeleteSubscriberValidator;
use ExpertSender\Validators\GetSubscriberListsValidator;
use ExpertSender\Validators\Abstracts\IAddEventValidator;
use ExpertSender\Validators\Abstracts\IGetListsValidator;
use ExpertSender\Validators\AddAndUpdateSubscriberValidator;
use ExpertSender\Validators\Abstracts\IAddDataTableValidator;
use ExpertSender\Validators\Abstracts\IDeleteDataTableValidator;
use ExpertSender\Validators\Abstracts\ISearchDataTableValidator;
use ExpertSender\Validators\Abstracts\IDeleteSubscriberValidator;
use ExpertSender\Validators\Abstracts\IGetSubscriberListsValidator;
use ExpertSender\Validators\Abstracts\IAddAndUpdateSubscriberValidator;

class ExpertSenderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/expert-sender.php' => config_path('expert-sender.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // ExpertSender
        $this->app->bind(IExpertSender::class, ExpertSender::class);
        $this->app->bind(IExpertSenderExamples::class, ExpertSenderExamples::class);

        // Validators
        $this->app->bind(IAddEventValidator::class, AddEventValidator::class);
        $this->app->bind(IGetSubscriberListsValidator::class, GetSubscriberListsValidator::class);
        $this->app->bind(IAddAndUpdateSubscriberValidator::class, AddAndUpdateSubscriberValidator::class);
        $this->app->bind(IAddDataTableValidator::class, AddDataTableValidator::class);
        $this->app->bind(IDeleteDataTableValidator::class, DeleteDataTableValidator::class);
        $this->app->bind(ISearchDataTableValidator::class, SearchDataTableValidator::class);
        $this->app->bind(IDeleteSubscriberValidator::class, DeleteSubscriberValidator::class);
        $this->app->bind(IGetListsValidator::class, GetListsValidator::class);

        // HttpClient
        $this->app->bind(IHttpResponse::class, HttpResponse::class);
        $this->app->bind(IHttpClient::class, HttpClient::class);
    }

    /**
     * Get the provided services.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'IExpertSender',
            'IExpertSenderExamples',
            'IAddEventValidator',
            'IGetSubscriberListsValidator',
            'IAddAndUpdateSubscriberValidator',
            'IAddDataTableValidator',
            'IDeleteDataTableValidator',
            'ISearchDataTableValidator',
            'IDeleteSubscriberValidator',
            'IGetListsValidator',
            'IHttpResponse',
            'IHttpClient'
        ];
    }
}
