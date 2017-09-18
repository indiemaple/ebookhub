<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Ebookhub\Handler\Exception\ImageUploadException;
use Ebookhub\Markdown\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function index(Request $request)
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create(Request $request)
    {
        return view('books.create_edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);


        $data['user_id'] = Auth::id();
        $data['title'] = $request->title;
        $data['create_at'] = Carbon::now()->toDateTimeString();
        $data['update_at'] = Carbon::now()->toDateTimeString();
        $data['body'] = $request->body;
        $data['description'] = $request->description;
        $data['baidu_source'] = $request->baidu_source;
        $data['baidu_source_key'] = $request->baidu_source_key;

        $markdown = new Markdown();
        $data['body_original'] = $data['body'];
        $data['body'] = $markdown->convertMarkdownToHtml($data['body']);

        // 封面图
        if ($file = $request->file('cover')) {
            $uploadStatus = app('Ebookhub\Handler\ImageUploadHandler')->uploadImage($file);
            $data['cover'] = $uploadStatus['filename'];
        }

        $book = Book::create($data);

        if (! $book) {
            Flash::error('发布失败' . $book->getErrors());
            return redirect('/');
        }

        Flash::success('发布成功');
        return redirect()->to(route('books.show', ['id' => $book]));
    }

    public function show($id, Request $request)
    {
        $book = Book::where('id', $id)->firstOrFail();
//        dd($book);
        return view('books.show', compact('book'));
    }


    public function uploadImage(Request $request)
    {
        if ($file = $request->file('file')) {
            try {
                $upload_status = app('Ebookhub\Handler\ImageUploadHandler')->uploadImage($file);
            } catch (ImageUploadException $exception) {
                return ['error' => $exception->getMessage()];
            }
            $data['filename'] = $upload_status['filename'];

        } else {
            $data['error'] = 'Error while upload file';
        }

        return $data;
    }


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('update', $book);


        return view('books.create_edit', compact('book'));
    }

    public function update($id, Request $request)
    {
        $book = Book::findOrFail($id);
        $this->authorize('update', $book);

        $data = $request->only('title', 'body');

        $markdown = new Markdown();
        $data['body_original'] = $data['body'];
        $data['body'] = $markdown->convertMarkdownToHtml($data['body']);

        $book->update($data);
        Flash::success('更新成功');
        return redirect()->to(route('books.show', ['id' => $id]));
    }

    private function isDuplicate($data)
    {
        $last_topic = Book::where('user_id', Auth::id())
                            ->orderBy('id', 'desc')
                            ->first();

        return count($last_topic) && strcmp($last_topic->title, $data['title']) === 0;
    }
}
