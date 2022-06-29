<?php

use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title'     => '手机配件',
                'children' => [
                    ['title' => '手机壳'],
                    ['title' => '贴膜'],
                    ['title' => '存储卡'],
                    ['title' => '数据线'],
                    ['title' => '充电器'],
                    [
                        'title'     => '耳机',
                        'children' => [
                            ['title' => '有线耳机'],
                            ['title' => '蓝牙耳机'],
                        ],
                    ],
                ],
            ],
            [
                'title'     => '电脑配件',
                'children' => [
                    ['title' => '显示器'],
                    ['title' => '显卡'],
                    ['title' => '内存'],
                    ['title' => 'CPU'],
                    ['title' => '主板'],
                    ['title' => '硬盘'],
                ],
            ],
            [
                'title'     => '电脑整机',
                'children' => [
                    ['title' => '笔记本'],
                    ['title' => '台式机'],
                    ['title' => '平板电脑'],
                    ['title' => '一体机'],
                    ['title' => '服务器'],
                    ['title' => '工作站'],
                ],
            ],
            [
                'title'     => '手机通讯',
                'children' => [
                    ['title' => '智能机'],
                    ['title' => '老人机'],
                    ['title' => '对讲机'],
                ],
            ],
        ];

        foreach ($categories as $data) {
            $this->createCategory($data);
        }
    }

    protected function createCategory($data, $parent = null)
    {
        // 创建一个新的类目对象
        $category = new \App\Models\ProductCategory(['title' => $data['title']]);
        // 如果有 children 字段则代表这是一个父类目
        $category->is_directory = isset($data['children']);
        // 如果有传入 $parent 参数，代表有父类目
        if (!is_null($parent)) {
            $category->parent()->associate($parent);
        }
        //  保存到数据库
        $category->save();
        // 如果有 children 字段并且 children 字段是一个数组
        if (isset($data['children']) && is_array($data['children'])) {
            // 遍历 children 字段
            foreach ($data['children'] as $child) {
                // 递归调用 createCategory 方法，第二个参数即为刚刚创建的类目
                $this->createCategory($child, $category);
            }
        }
    }
}
