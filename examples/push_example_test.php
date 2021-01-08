<?php
// 这只是使用样例,不应该直接用于实际生产环境中 !!

require 'config.php';

// 完整的推送示例
// 这只是使用样例,不应该直接用于实际生产环境中 !!
try {
    $response = $client->push()
        //->setPlatform('all') //ios android
        ->setPlatform('android')
        // 一般情况下，关于 audience 的设置只需要调用 addAlias、addTag、addTagAnd  或 addRegistrationId
        // 这四个方法中的某一个即可，这里仅作为示例，当然全部调用也可以，多项 audience 调用表示其结果的交集
        // 即是说一般情况下，下面三个方法和没有列出的 addTagAnd 一共四个，只适用一个便可满足大多数的场景需求

        // ->addAlias('alias')
        // ->addTag(array('tag1', 'tag2'))
        ->addRegistrationId(['1122'])
        //->addRegistrationId(['1122','ff1c3faffbc4391a805e0776cdadbb7e25f482c7','e9c2f0ae056e069fee8765bd7b7f3b58e8e0407a','4d407d293f798e99de3c6d6d674f035908f12aef', 'ff109686c280e4d4d9d2aacb6506cc6e963f7952'])
        // ->addAllAudience()

        //->setNotificationAlert('Hi, JPush')
        ->iosNotification('Hello IOS', array(
            // 'sound' => 'sound.caf',
            // 'badge' => '1',
            // 'content-available' => true,
            // 'mutable-content' => true,
            'category' => 'jiguang',
            'extras' => array(
                'key' => 'value',
                'jiguang'
            ),
        ))
        ->androidNotification('Hello Android 测试', array(
            'title' => 'hello jpush',
            // 'builder_id' => 2,
            'extras' => array(
                'key' => 'value',
                'jiguang'
            ),
        ))
        ->options(array(
            // apns_production: 表示APNs是否生产环境，
            // True 表示推送生产环境，False 表示要推送开发环境；如果不指定则默认为推送开发环境
            'apns_production' => false,
        ))
        //->build();
        ->send();
        print_r($response);

} catch (\JPush\Exceptions\APIConnectionException $e) {
    // try something here
    print $e;
} catch (\JPush\Exceptions\APIRequestException $e) {
    // try something here
    print $e;
}
