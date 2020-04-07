<?php

namespace ExpertSender;

use Carbon\Carbon;
use ExpertSender\Abstracts\IExpertSender;
use ExpertSender\Requests\Event\DataField;
use ExpertSender\Requests\Event\EventData;
use ExpertSender\Requests\DataTable\Add\Row;
use ExpertSender\Requests\DataTable\Add\Column as AddColumn;
use ExpertSender\Requests\DataTable\Delete\Column as DeleteColumn;
use ExpertSender\Requests\Event\AddEventRequest;
use ExpertSender\Abstracts\IExpertSenderExamples;
use ExpertSender\Requests\DataTable\Search\Where;
use ExpertSender\Requests\DataTable\AddDataTableRequest;
use ExpertSender\Requests\Subscriber\GetSubscriberRequest;
use ExpertSender\Requests\DataTable\DeleteDataTableRequest;
use ExpertSender\Requests\DataTable\SearchDataTableRequest;
use ExpertSender\Requests\Subscriber\AddAndUpdate\Property;
use ExpertSender\Requests\Subscriber\AddAndUpdate\SubscriberData;
use ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest;
use ExpertSender\Requests\Subscriber\DeleteSubscriberRequest;
use ExpertSender\Requests\Unit\GetListsRequest;

class ExpertSenderExamples implements IExpertSenderExamples
{
    /**
     * @var \ExpertSender\Abstracts\IExpertSender
     */
    private $expertSender;

    /**
     * @var string
     */
    private $apiKey = 'xxxxxxxxxxxxxxxxxxxx';

    /**
     * Creates new object instance.
     */
    public function __construct(
        IExpertSender $expertSender
    ) {
        $this->expertSender = $expertSender;
    }

    /**
     * Set api key for tests.
     *
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get business unit lists.
     */
    public function getBusinessUnitLists(): void
    {
        $request = new GetListsRequest($this->apiKey);

        $response = $this->expertSender->getBusinessUnitLists($request);

        dd($response);
    }

    /**
     * Get subscriber lists in bussiness unit.
     */
    public function getSubscriberLists(): void
    {
        $request = new GetSubscriberRequest($this->apiKey, 'm@smid.pl');

        $response = $this->expertSender->getSubscriberLists($request);

        dd($response);
    }

    /**
     * Create ExpertSender subscriber on list in business unit.
     */
    public function addAndUpdateSubscriber(): void
    {
        $request = new AddAndUpdateSubscriberRequest(
            $this->apiKey,
            new SubscriberData(41, 'm@smid.pl'),
            [
                new Property(4, 'Olsztyn'),
                new Property(8, 'Nie')
            ]
        );

        $response = $this->expertSender->addAndUpdateSubscriber($request);

        dd($response);
    }

    /**
     * Delete ExpertSender subscriber from list in business unit.
     */
    public function deleteSubscriber(): void
    {
        $request = new DeleteSubscriberRequest(
            $this->apiKey,
            'm@smid.pl'
        );

        $response = $this->expertSender->deleteSubscriber($request);

        dd($response);
    }

    /**
     * Create ExpertSender event.
     */
    public function addEvent(): void
    {
        $request = new GetSubscriberRequest($this->apiKey, 'm@smid.pl');

        $subscriber = $this->expertSender->getSubscriberLists($request);

        if (!$subscriber) {
            exit;
        }

        $request = new AddEventRequest(
            $this->apiKey,
            new EventData(1, (int)$subscriber->Data->Id, [
                new DataField('cart_sum', 22499, 'Number'),
                new DataField('product_1_name', 'Nike Cortez Basic SL EP (GS) (BV0014-100)'),
                new DataField('product_1_price', 22499, 'Number'),
                new DataField('product_1_url', 'https://picsum.photos/200/300'),
                new DataField('product_1_img_url', 'https://picsum.photos/200/300'),
                new DataField('product_1_quantity', 1, 'Number')
            ])
        );

        $response = $this->expertSender->addEvent($request);

        dd($response);
    }

    /**
     * Add DataTable.
     */
    public function addDataTable(): void
    {
        $request = new AddDataTableRequest($this->apiKey, 'insert_test', [
            new Row([
                new AddColumn('id', 1),
                new AddColumn('email', 'm@smid.pl'),
                new AddColumn('date', Carbon::now())
            ]),
            new Row([
                new AddColumn('id', 2),
                new AddColumn('email', 'kontakt@smid.pl'),
                new AddColumn('date', Carbon::now())
            ])
        ]);

        $response = $this->expertSender->addDataTable($request);

        dd($response);
    }

    /**
     * Delete DataTable.
     */
    public function deleteDataTable(): void
    {
        $request = new DeleteDataTableRequest($this->apiKey, 'insert_test', [
            new DeleteColumn('id', 1)
        ]);

        $response = $this->expertSender->deleteDataTable($request);

        dd($response);
    }

    /**
     * Search and count DataTable for rows.
     */
    public function countSearchDataTable(): void
    {
        $request = new SearchDataTableRequest($this->apiKey, 'orders', [
            new Where('email', 'm@smid.pl', 'Equals')
        ]);

        $response = $this->expertSender->countSearchDataTable($request);

        dd($response);
    }

    /**
     * Search DataTable for rows.
     */
    public function searchDataTable(): void
    {
        $request = new SearchDataTableRequest($this->apiKey, 'orders', [
            new Where('email', 'm@smid.pl', 'Equals'),
            new Where('value', 100, 'Greater'),
            new Where('value', 300, 'Lower')
        ]);

        $request->setLimit(80);

        $response = $this->expertSender->searchDataTable($request);

        dd($response);
    }
}
