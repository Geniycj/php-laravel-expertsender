<?php

namespace ExpertSender;

use ExpertSender\Abstracts\IExpertSender;
use ExpertSender\Requests\Event\DataField;
use ExpertSender\Requests\Event\EventData;
use ExpertSender\Requests\Event\AddEventRequest;
use ExpertSender\Abstracts\IExpertSenderExamples;
use ExpertSender\Requests\Subscriber\GetSubscriberRequest;
use ExpertSender\Requests\Subscriber\AddAndUpdate\Property;
use ExpertSender\Requests\Subscriber\AddAndUpdate\SubscriberData;
use ExpertSender\Requests\Subscriber\AddAndUpdateSubscriberRequest;

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
     * Create ExpertSender event.
     */
    public function addEvent(): void
    {
        $apiKey = $this->apiKey;

        $request = new GetSubscriberRequest($apiKey, 'm@smid.pl');

        $subscriber = $this->expertSender->getSubscriberLists($request);

        if (!$subscriber) {
            exit;
        }

        $request = new AddEventRequest(
            $apiKey,
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
}
