<?php

namespace App\tests\unit\models;

use Yii;
use App\Models\Feedback;
use App\Models\Forms\FeedbackForm;
use App\tests\fixtures\FeedbackFixture;

class FeedbackFormTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return ['feedback' => FeedbackFixture::className()];
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSendFeedbackFormWithInvalidData()
    {
        $feedbackModel = new FeedbackForm();

        $feedbackModel->customer = 'FIO';
        $feedbackModel->phone = '+0(000)000-00-00';
        $feedbackModel->status = 0;

        expect($feedbackModel->validate())->equals(false);
    }

    public function testSendFeedbackFormWithValidData()
    {
        $feedbackModel = new FeedbackForm();

        $feedbackModel->customer = 'FIO';
        $feedbackModel->phone = '+7(999)999-44-55';
        $feedbackModel->status = 0;

        expect($feedbackModel->save())->equals(true);
    }

}