<?php

namespace app\admin\controller;

use app\admin\model\ArtCates;
use app\admin\model\Articles;
use app\admin\validate\articleValidate;
use think\Controller;
use think\Request;

class Article extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     *
     */
    public function index()
    {
        // 使用分页功能
        // $artModel = new Articles();
        $list = model('articles')->paginate(5); // 每页显示5条数据
        // 显示文章管理列表
        // $list = $list->toArray();
        return view('admin@article/article', compact('list'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        // 将文章分类数据查询出来
        $cate = db('articles.art_cates')->select();
        // 加载添加文章界面
        return view('admin@article/create', compact('cate'));
    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return void
     */
    public function save(Request $request)
    {
        // 文章表单提交控制器

        $ret = $this->validate($request->post(), articleValidate::class);

        if ($ret !== true) {
            // 验证失败
            return $this->error($ret);
        }

        // 验证成功
        // 调用模型将新文章上传到数据库
        $data = $request->post();
        $submit = [
            'title' => $data['title'],
            'body' => $data['body'],
            'desn' => $data['desn'],
            'users_id' => session('admin.user')['id'],
            'cates_id' => $data['art_cates']
        ];
        Articles::create($submit);

        // 重定向到文章列表
        return $this->redirect('/admin/art');
    }

    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return \think\Response
     */
    public function edit(int $id)
    {
        // 查询出数据库中的数据渲染到模板中
        $data = Articles::get($id);
        // 查询所有文章标签
        $cate = ArtCates::select();

        // 加载编辑页面
        return view('admin@article/edit', compact('data', 'cate'));
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request
     * @param int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {

        // 判断内容是否合法之后进行提交操作
        $validate = new articleValidate();
        if (!$validate->check($request->post())) {
            // 验证失败
            return $this->error($validate->getError());
        }

        // dump($request->post());
        // 上传数据库
        $data = $request->post();
        Articles::where('id', $id)->update([
            'desn' => $data['desn'],
            'title' => $data['title'],
            'cates_id' => $data['art_cates'],
            'body' => $data['body']
        ]);

        // 更新数据之后重定向
        return redirect('/admin/art');

    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        // 调用模型进行删除操作
        $ret = Articles::destroy($id);
        if (!$ret) {
            return json(['status'=>1,'msg'=>'删除失败']);
        }

        // 删除成功
        return json(['status'=>0,'msg'=>'删除成功']);
    }
}
