<?php

namespace ExpertSender;

use ExpertSender\ExpertSender;
use ExpertSender\ExpertSenderExamples;
use Illuminate\Support\ServiceProvider;
use ExpertSender\Abstracts\IExpertSender;
use ExpertSender\Validators\AddEventValidator;
use ExpertSender\Packages\HttpClient\HttpClient;
use ExpertSender\Abstracts\IExpertSenderExamples;
use ExpertSender\Packages\HttpClient\IHttpClient;
use ExpertSender\Packages\HttpClient\HttpResponse;
use ExpertSender\Packages\HttpClient\IHttpResponse;
use ExpertSender\Validators\GetSubscriberListsValidator;
use ExpertSender\Validators\Abstracts\IAddEventValidator;
use ExpertSender\Validators\AddAndUpdateSubscriberValidator;
use ExpertSender\Validators\Abstracts\IGetSubscriberListsValidator;
use ExpertSender\Validators\Abstracts\IAddAndUpdateSubscriberValidator;
use ExpertSender\Validators\Abstracts\IAddDataTableValidator;
use ExpertSender\Validators\Abstracts\IDeleteDataTableValidator;
use ExpertSender\Validators\Abstracts\ISearchDataTableValidator;
use ExpertSender\Validators\AddDataTableValidator;
use ExpertSender\Validators\DeleteDataTableValidator;
use ExpertSender\Validators\SearchDataTableValidator;

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
            'IHttpResponse',
            'IHttpClient'
        ];
    }
}
