<?php

namespace Tests\Acceptance;

use Codeception\Example;
use Page\Search;

/**
 * Класс для тестирования поиска
 *
 */
class SearchCest 
{
    /**
     * Тест на проверку поиска легковых по типу кузова
     * 
     * @param Example $data
     * @dataProvider getDataForSearchCarsByBody
     */
    public function searchCarsByBodyType(\AcceptanceTester $I, Example $data)
    {
        $I->amOnPage('');
        $I->waitForElementClickable(Search::$autoCarsLink);
        $I->click(Search::$autoCarsLink);
        $I->waitForElementClickable(Search::$optionalSearchLink);
        $I->click(Search::$optionalSearchLink);
        $I->waitForElementClickable(Search::$carBodyTypeField);
        $I->click(Search::$carBodyTypeField);
        $I->click(sprintf(Search::$carBodyType, $data['carBodyType']));
        $I->click(Search::$searchButton);
        $I->seeInCurrentUrl($data['url']);
    }

    protected function getDataForSearchCarsByBody()
    {
        $carBodyTypedata = [
            ['carBodyType' => 'sedan', 'url' => 'sedan'],
            ['carBodyType' => 'station-wagon', 'url' => 'station-wagon'],
            ['carBodyType' => 'hatchback', 'url' => 'hatchback'],
            ['carBodyType' => 'limousine', 'url' => 'limousine'],
            ['carBodyType' => 'body-coupe', 'url' => 'body-coupe'],
            ['carBodyType' => 'body-roadster', 'url' => 'body-roadster'],
            ['carBodyType' => 'cabriolet', 'url' => 'cabriolet'],
            ['carBodyType' => 'suv', 'url' => 'suv'],
            ['carBodyType' => 'crossover-suv', 'url' => 'crossover-suv'],
            ['carBodyType' => 'microvan', 'url' => 'microvan'],
            ['carBodyType' => 'minivan', 'url' => 'minivan'],
            ['carBodyType' => 'van', 'url' => 'van'],
            ['carBodyType' => 'wagon', 'url' => 'wagon'],
            ['carBodyType' => 'body-pickup', 'url' => 'body-pickup'],
            ['carBodyType' => 'targa', 'url' => 'targa'],
            ['carBodyType' => 'fastback', 'url' => 'fastback'],
            ['carBodyType' => 'liftback', 'url' => 'liftback'],
            ['carBodyType' => 'hardtop', 'url' => 'hardtop'],
        ];

        return [$carBodyTypedata[array_rand($carBodyTypedata)]];
    }
}
