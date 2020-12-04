<?php


namespace App\Http\Controllers\Test;

use App\Events\UserLogin;
use App\Http\Controllers\BaseController;
use App\Jobs\RebbitMq;
use App\Model\User\User;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends BaseController
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
//        $this->middleware('auth');

//        $this->middleware('age')->only('age');

//        $this->middleware('subscribed')->except('store');

    }

    public function test1(Request $request)
    {
        echo 1;
    }

    public function test()
    {
        echo 1;
        $client = ClientBuilder::create()->setHosts(['192.168.33.10'])->build();
//        $param = [
//            'index' => 'users',
//            'body' => [
//                'settings' => [
//                    'number_of_shards' => 3,
//                    'number_of_replicas' => 2
//                ],
//                'mappings' => [
//                    '_source' => [
//                        'enabled' => true
//                    ],
//                    'properties' => [
//                        'name' => [
//                            'type' => 'keyword'
//                        ],
//                        'age' => [
//                            'type' => 'integer'
//                        ],
//                        'mobile' => [
//                            'type' => 'text'
//                        ],
//                        'email' => [
//                            'type' => 'text'
//                        ],
//                        'birthday' => [
//                            'type' => 'date'
//                        ],
//                        'address' => [
//                            'type' => 'text'
//                        ]
//                    ]
//                ]
//            ]
//        ];
//        $client->indices()->create($param);

//        $params = [
//            'index' => 'users',
////            'id'    => 1,
//            'body'  => [
//                'name'     => '测试22',
//                'age'      => 10,
//                'email'    => 'zs@gmail.com',
//                'birthday' => '1990-12-12',
//                'address'  => '测试fd1'
//            ]
//        ];
//        $client->index($params);
//        $arr = [
//            ['name' => '张三', 'age' => 10, 'email' => 'zs@gmail.com', 'birthday' => '1990-12-12', 'address' => '北京'],
//            ['name' => '李四', 'age' => 20, 'email' => 'ls@gmail.com', 'birthday' => '1990-10-15', 'address' => '河南'],
//            ['name' => '白兮', 'age' => 15, 'email' => 'bx@gmail.com', 'birthday' => '1970-08-12', 'address' => '杭州'],
//            ['name' => '王五', 'age' => 25, 'email' => 'ww@gmail.com', 'birthday' => '1980-12-01', 'address' => '四川'],
//        ];
//        foreach ($arr as $key => $document) {
//            $params['body'][] = [
//                'index' => [
//                    '_index' => 'users',
//                    '_id'    => $key
//                ]
//            ];
//
//            $params['body'][] = [
//                'name'     => $document['name'],
//                'age'      => $document['age'],
//                'email'    => $document['email'],
//                'birthday' => $document['birthday'],
//                'address'  => $document['address']
//            ];
//        }
////        dd($params);
//        if (isset($params) && !empty($params)) {
//            $client->bulk($params);
//        }

//        $params = [
//            'index' => 'users',
//            'id'    => 1,
//        ];
//        $response = $client->get($params);
//        dump($response);

//        $params = [
//            'index' => 'users',
//            'id'    => 1,
//            'body'  => [
//                'doc' => [
//                    'mobile' => '17612345689',
//                    'address' => '测试1',
//                ]
//            ]
//        ];
//        $response = $client->update($params);
//        dump($response);


//        $params = [
//            'index' => 'users',
//            'id'    => '1',
//            'body'  => [
//                'script' => 'ctx._source.age += 5',
//            ]
//        ];
//        $response = $client->update($params);
//        dump($response);


//        $params = [
//            'index' => 'users',
//            'id'    => 2,
//        ];
//        $response = $client->delete($params);
//        dump($response);


//        $params = [
//            'index' => 'users',
//            'body' => [
//                'query' => [
//                    'match' => [
//                        'address' => '测'
//                    ]
//                ]
//            ]
//        ];

//        $params = [
//            'index' => 'users',
//            'body' => [
//                'query' => [
//                    'bool' => [
//                        'must' => [
//                            ['match' => ['aa' => 'aa']],
//                            ['match' => ['name' => '李四']]
//                        ]
//                    ]
//                ]
//            ]
//        ];

//        $params = [
//            'index' => 'users',
//            'body' => [
//                'query' => [
//                    'bool' => [
//                        'filter' => [
//                            'term' => ['age' => '11']
//                        ],
//                        'should' => [
//                            ['match' => ['aa' => 'aa']],
//                            ['match' => ['name' => '四']]
//                        ]
//                    ]
//                ]
//            ]
//        ];
//
//        $response = $client->search($params);
//        dump($response);


// Index Stats
// Corresponds to curl -XGET localhost:9200/_stats
//        $response = $client->indices()->stats();


// Node Stats
// Corresponds to curl -XGET localhost:9200/_nodes/stats
//        $response = $client->nodes()->stats();

// Cluster Stats
// Corresponds to curl -XGET localhost:9200/_cluster/stats
        $response = $client->cluster()->stats();
//        dd($response);

    }


    /**
     * @param  Request  $request
     */
    public function store(Request $request)
    {
        $this->dispatch();
//        RebbitMq::dispatch();
    }

    /**
     * @param  Request  $request
     */
    public function age(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'age' => 'required|max:255',
        ]);
        dump($validator->messages());
    }

    public function eventTest()
    {
        $a = 22222222;
        event(new UserLogin($a));
    }

    /**
     * 数据库操作
     */
    public function dbTest(Request $request)
    {
        $user = User::query()->get();;
        return $user;
    }


    public function upload(Request $request)
    {
        $request->file('qa')->store('/images');
        echo 1;
    }

}
