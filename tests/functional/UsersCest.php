<?php

use Codeception\Example;

/**
 * Класс для работы с юзером
 */
class UsersCest
{
    public static $defaultSchema = [
        '_id'       => 'string',
        'email'     => 'string',
        'superhero' => 'boolean',
        'name'      => 'string',
        'owner'     => 'string'
        ];

    /**
     * Тест на создание юзера
     * @group hhh
     */
    public function checkUserCreate(\FunctionalTester $I)
    {
        $userData = [
            'email' => $I->getFaker()->email,
            'owner' => $I->getFaker()->userName,
            'name'  => $I->getFaker()->name,
            'job'   => $I->getFaker()->company,
        ];

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('human', $userData);
        $id = json_decode($I->grabResponse(), true)['_id'];
        
        
        // $dataForUpdate = [
        //     'email' => '777sd@ksds.as',
        //     'name' => '7745347',
        //     'owner' => 'owner777'
        // ];

        // $I->sendPut('/human?_id='. $id, $dataForUpdate);
        
       
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(['status' => 'ok']);
        $I->sendGet('people', $userData);
        $I->seeResponseMatchesJsonType(self::$defaultSchema);
        
    }

    /**
     * Проверяем негативный сценарий на создание пользователя без email
     * 
     * @dataProvider getDataForCreateUserNegative
     * @param Example $data
     */
    public function checkUserCreateNegative(\FunctionalTester $I, Example $data)
    {
        $email = $I->getFaker()->email;
        $owner = $I->getFaker()->userName;

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('human', [
            $data['email'] ? $email : null,
            $data['owner'] ? $owner : null,
        ]);
        $I->seeResponseContainsJson($data['errorText']);
    }

    /**
     * dataProvider для теста checkUserCreateNegative
     */
    protected function getDataForCreateUserNegative()
    {
        return [
            [
                'email' => true,
                'owner' => false,
                'errorText' => ['message' => 'email не передан']
            ],
            [
                'email' => false,
                'owner' => true,
                'errorText' => ['message' => 'email не передан']
            ]
        ];
    }
}