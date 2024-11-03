<!-- 必須 -->
docker compose exec app sh
docker compose exec node sh


<!-- キャッシュ削除 -->
php artisan optimize:clear
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
composer dump-autoload
php artisan clear-compiled
php artisan config:cache


<!-- seeder実装 -->
php artisan migrate:refresh

php artisan migrate:fresh --seed
# これだとrollbackせずにseederを消すから落ちずにforeignKeyでエラーはいてもできるよ！

php artisan db:seed --class=quizzes
php artisan db:seed --class=questions
php artisan db:seed --class=choices
php artisan db:seed --class=QuizSeeder


<!-- セッション表示 -->
@if (session('セッション名'))
<div>
    {{ session('セッション名') }}
</div>
@end
例.
@if (session('success'))
<div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@end

<!-- 表示系 -->
# 1.ルート設定 in routesフォルダ
use ~~~;
Route::HTTPメソッド('URL', [コントローラー::class, 'メソッド名'])
    ->name('ルート名');  #補足情報は "->" で記述

use ~~\AnyController;
Route::get('/anything', [AnyController::class, 'Anything']);

# 2.ビューファイル作成 in ターミナル
php artisan make:controller AnyController  <=AnyControllerはコントローラー名

# 3.ビューファイル作成 in resourcesフォルダ
???.blade.php

# 4.コントローラー内の記述 in コントローラー.php
class ???Controller extends Controller
{
    public function ルートで設定したメソッド名() {
        return view ('ビューファイル名');
    }
}


<!-- コンポネント -->
# 1.x-???タグの変更
in /components/~~~.php

# 2.ヘッダーの編集
in /layout/~~~.php


<!-- blade.phpファイルへのjs読み込み -->
# 1.jsファイル作成 in resources/js/~~.js

# 2.viteの設定 in vite.config.js
input:[
    'resources/js/~~/js',
]

# 3.bladeファイルに記述 in ~~.blade.phpのhead
@vite('resources/js/~~~.js')

# 4.nodeの更新 in ターミナル
npm run build


<!-- テーブル系 -->
# 1.マイグレーションファイルの新規作成 in ターミナル
php artisan make:model Anything -m   <=Anyhingはモデル名

# 2.マイグレーションファイルの記述 in app/database/migration/20xx_xx~~Anything.php
＊upとdownのどちらも記述されていることを確認する
(例)
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable()->default(null)->comment('設問画像 ex. /image/sample.jpg');
            $table->string('text')->comment('設問 ex. 日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？');
            $table->string('supplement')->nullable()->comment('設問補足');
            $table->unsignedBigInteger('quiz_id');
            $table->timestamps();
        
            $table->foreign('quiz_id')->references('id')->on('quizzes');
        });
    }

# 3.モデルの設定
例.
protected $fillable = [x
    'image',
    'text',
    'supplement',
    'quiz_id',
];

# 4.マイグレーションファイルのデータベース反映 in ターミナル
php artisan migrate
<=>php artisan migrate:rollback

★マイグレーションの変更
php artisan make:migration マイグレーションファイル名 --table=編集するテーブル名

upに追加する情報と、downに削除する情報を記入

# 4.シーダーの作成 in ターミナル
php artisan make:seeder シーダー名

\App\Models\モデル名::create([
    'name' => 'ITクイズ',
]);

php artisan db:seed --class=シーダー名
<=>php artisan migrate:refresh

# 5.ファクトリーでの大量ダミーデータ in ターミナル
php artisan make:factory モデル名Factory
例.
php artisan make:factory AnythingFactory

# 5.5ファクトリーでの大量ダミーデータ in ~~Factory.php
return [
    'テーブルカラム名'=>fake()->データタイプ(文字数(整数)),
];
例.
return [
    'title'=>fake()->realText(10),
    'body'=>fake()->realText(20),
];

# 5.7シーダー作成 inターミナル
php artisan make:seeder シーダー名
例.
php artisan make:seeder Anything

↓

\App\Models\モデル名::factory(作成個数)->create();
例.
\App\Models\Anything::factory(50)->create();

php artisan db:seed --class=シーダー名
<=>php artisan migrate:refresh


# ★テーブルカラムの変更 
in ターミナル
php artisan make:migration マイグレーションファイル名 --table=編集するテーブル名
例.
php artisan make:migration add_deleted_at_to_quizzes_table --table=quizzes

in マイグレーションファイル
public function up(): void
    {
        Schema::table('変更するテーブル', function (Blueprint $table) {
            $table->追加、削除したい内容;
        });
    }
public function down(): void
    {
        upの逆の動作
    }
例.
public function up(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->softDeletes();
        });
    }
public function down(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }

php artisan migrate

<!-- Data表示系 -->
# 1.Modelからデータ取得 in コントローラーファイル
use ~\quizzes;
public function quiz() {
    $quiz = quizzes::all();
    return view ('quiz', compact('quiz'));
}

# 2.viewファイルで表示 in ~~.blade.php
@foreach($quiz as $quizes)
<div class="mt-4 p-8 bg-white w-full rounded-2xl">
    <h1 class="p-4 text-lg font-semibold">
        {{$quizes->name}}
    </h1>
</div>
@endforeach

# 3.画面遷移 in ~~.blade.php
<a href="{{ route('ルートファイル(web.php)のname値') }}">


<!-- 外部キーとの連携for Viewファイル -->
# 1.モデルにリレーション設定 in \Model\~~.php
★in 親側
public function 適当な変数名() {
    return $this->hasMany(紐づけたいモデル名::class), '外部キー';
}
★in 子側
public function 適当な変数名() {
    return $this->belongsTo(紐づけたいモデル名::class, '外部キー');
}

# 2.Viewファイルに記述 in ~~.b;lade.php
{{$変数->user->name}}


<!-- 個別表示 -->
# 1.ルート設定 in web.php
Route::get('URLのこの部分が合う必要がある名前/{URLに渡される変数名}', [コントローラー名::class, 'show'])
->name('任意の名前');

例.
Route::get('quizzes/{each}', [QuizController::class, 'show'])
->name('quiz.each');

# 2.コントローラーの指定 in /Controllers/~~.php
public function show($変数１) {
    $変数２ = 表示させたいモデル名::findOrFail($変数１); 
    return view('ルートで設定した名前', compact('変数２'));
}

例.
public function show($id) {
    $quiz = quizzes::findOrFail($id); 
    return view('quiz.each', compact('quiz'));
}

# 2.5.別のテーブルも一緒に取得 in /Controllers/~~.php
public function show($変数１) {
    $変数２ = 紐づけたいテーブル１の名前::with('紐づけたいテーブル２の名前')->findOrFail($変数２); 
    return view('ルートで設定した名前', compact('変数２'));
}

例.
public function show($id) {
    $quiz = quizzes::with('questions.choices')->findOrFail($id); 
    return view('quiz.each', compact('quiz'));
}

# 3.個別表示用のビューファイルの作成

# 4.リンクの追加 in 親サイト.blade.php
<a href="{{ route('子サイトのname', $変数(foreachとかのasの後ろのやつ)) }}"></a>
例.
<a href="{{ route('quiz.each', $quizes->id) }}"></a>


<!-- 編集機能 -->
# 1.コントローラー(編集用フォームの表示)の設定 in /Controllers/~~.php
public function edit($変数１) {
    $変数２ = 使用するモデル名::with('連携したいモデル名')->findOrFail($変数１);
    return view('ルートで設定したビューの名前', compact('変数２'));
}
例.
public function edit($id) {
    $quiz = Quizzes::with('questions.choices')->findOrFail($id);
    return view('quiz.edit', compact('quiz'));
}

# 2.コントローラー(データの更新)の設定 in /Controllers/~~.php
public function update(Request $変数２(フォームから送信されたものとか入る), $変数２) {
    $変数２->validate([
        'バリデーション' => 'required|データ型',
    ]);
    $変数３ = quizzes::findOrFail($変数１);
    $変数３->name = $変数２->input('name');  <=input('name')のnameはインプットタグのname属性を表す
    $変数３->save();
    return redirect()->route('遷移したいビューの名前(Routeで決めたやつ)', $変数３->id)->with('セッション名', '表示したいメッセージ');
}
例.
public function update(Request $request, $id) {
    $request->validate([
        'name' => 'required|string',
    ]);
    $quiz = quizzes::findOrFail($id);
    $quiz->name = $request->input('name');
    $quiz->save();
    return redirect()->route('quizzes.index', $quiz->id)->with('success', 'クイズが更新されました。');
}

<!-- 削除機能(物理削除) -->
# 1.ルート設定 in web.php
Route::delate('URLのこの部分が合う必要がある名前/{URLに渡される変数名}', [コントローラー名::class, 'destroy'])
->name('任意の名前');

例.
Route::delate('/quizzes/{id}', [QuizController::class, 'destroy'])
->name('quizzes.destroy');

# 2.コントローラーの設定 in /Controllers/~~.php
public function destroy($変数１) {
    $変数２ = 削除したいモデル名::with('連携したいモデル名')->findOrFail($変数１);
    foreach ($変数２->変数３ as $変数４) {
        $変数４->delete();
    }
    $変数２->delete();
       return redirect()->route('遷移したいビューの名前(Routeで決めたやつ)')->with('セッション名', '表示したいメッセージ');
}
例.
public function destroy($id) {
    $quiz = quizzes::with('questions.choices')->findOrFail($id);
    foreach ($quiz->questions as $question) {
        foreach ($question->choices as $choice) {
            $choice->delete();
        }
        $question->delete();
    }
    $quiz->delete();
       return redirect()->route('quizzes.index')->with('success', 'クイズが削除されました。');
}

# //なんかできなかったら in ターミナル
php artisan route:clear
php artisan route:cache


<!-- 削除機能(論理削除) -->
# 1.Modelの設定 in /Models/~~.php *必要な個数
use Illuminate\Database\Eloquent\SoftDeletes;
class choices extends Model
{
    use SoftDeletes;
}

# 2.マイグレーションの更新 in /migrations/~~~.php *必要な個数
public function up()
{
    Schema::create('モデル名', function (Blueprint $table) {
        $table->id();
        $table->timestamps();

        $table->softDeletes(); // 追加
    });
}

# 3.ビューファイルの記述 in ~~.blade.php
物理削除と同じ

# 4.コントローラーの設定 in ~~Controller.php
public function destroy($変数１) {
    $変数２ = 削除したいモデル名::with('紐づけたいモデル名')->findOrFail($変数１);
    $quiz->delete(); 
    return redirect()->route('遷移先のルート名')->with('セッション名', '表示させたい文字');
}
例.
public function destroy($id) {
    $quiz = quizzes::with('questions.choices')->findOrFail($id);
    $quiz->delete(); // ソフトデリートを実行
    return redirect()->route('quizzes.index')->with('success', 'クイズが削除されました。');
}

# ルートの設定 in web.php
物理削除と同じ

# 削除されたものの表示(論理削除) in QuizController.php
public function ルート名()
{
    $変数１ = Model名::withTrashed();
    return view('遷移先ビューファイル', compact('変数１'));
}
例.
public function admin()
{
    $quiz = Quiz::withTrashed()->paginate(20);
    return view('quiz.admin', compact('quiz'));
}

in 表示ビューファイル
{{ $quizzes->trashed() ? 'text-gray-500' : '' }} <=削除済みは薄いグレー

<!-- ミドルウェアの設定(管理者設定) -->
# 1.マイグレーションの設定 in /migration/~~.php
Schema::table('users', function (Blueprint $table) {
    $table->string('role')->after('name')->nullable();
});

php artisan migrate

# 2.ミドルウェアの作成
php artisan make:middleware RoleMiddleware  <=HTTPの名前

in /HTTP/Kernel.php
'ミドルウェア名' => 場所::class,
例.
'admin' => \App\Http\Middleware\RoleMiddleware::class,

# 3.必要なコードの記述 in web.php
Route::プロパティ('URL', [コントローラー::class, 'メソッド'])
->middleware('auth', 'admin');


<!-- ページネーションの実装 -->
# 1.コントローラーの変更 in ~~~Controller.php
$変数 = Model名::all();
    ↓
$変数 = Model名::paginate(個数);
例.
quiz = Quiz::paginate(20);

# 2.ビューファイルの変更 in ~~.blade.php
{{コンパクトで設定した配列名->links()}}
例.
{{$quiz->links()}}

# 3.ページネーションのスタイルのカスタマイズ in ターミナル
php artisan vendor:publish --tag=laravel-pagination
↓
コンポーネントを編集 in views/vendor/pagination/tailwind.blade.php


<!-- コンポーネントの作成 -->
# 1.コンポーネント用ビューファイルの作成 in views/components/~~~.blade.php
@props(['プロパティ名'])
    {{ $プロパティ名 }}
例.
@props(['message'])
@if ($message)
<div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ $message }}
</div>
@endif

# 2.ビューファイルの変更 in ~~~.blade.php
<x-コンポネント名 :プロパティ名="表示させたいもの" />
例.
<x-message :message="session('success')" />


<!-- 作成フォーム -->
# 1.クイズフォームビューファイル作成

# 2.ルートの設定 in web.php
Route::post('リンク', [コントローラー名::class, '適当な名前'])
->name('name名');
例.
Route::post('/quizzes', [QuizController::class, 'store'])
->name('quiz.store')->middleware(['auth','admin']);

# 3.コントローラーの設定 in ~~~Controller.php
public function store(Request $request)
{
    $変数１ = $request->validate([
        'テーブルカラム名' => 'required|バリデーション',
    ]);
    $変数２ = 使うモデル名::create($変数１);
    return redirect()->route('遷移先');
}
例.
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
    ]);
    $quiz = Quiz::create($validated);
    return redirect()->route('quiz.admin')->with('success', 'クイズが作成されました。');
}

# 4.エラーメッセージの表示
<label for="変数１">名前</label>
<x-input-error :messages="$errors->get('name')" />
<input type="" name="変数１" value="{{old('変数１')}}"> <=valueにoldを追加
例.
<label for="name" class="font-semibold mt-4">クイズタイトル</label>
<x-input-error :messages="$errors->get('name')" class="mt-2" />
<input type="text" name="name" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{old('name')}}">

# 5.バリデーション用クラスの作成 in ターミナル
php artisan make:request クラス名

# 6.写真追加 in ターミナル 以外は記述済み
php artisan storage:link


<!-- Modelで定義したマジックナンバーをへんこうする -->
# Modelでの定義
const CATEGORY_STAFF = 2;
public function isStaff()
    {
        return $this->category === self::CATEGORY_STAFF;
    }

# 使うとき
$user = auth()->user();
/** @var User $user */
        if ($user->isStaff()) 
# こう書くことで$userがUser(Model)を参照して、そこのisStaff()を使ってることを明示的に示すことができる

Insert Final Newline 
# in設定ファイル

<!-- DSファイル削除-->
# ディレクトリ配下の.DS_Storeを検索
find . -name ".DS_Store"
# ディレクトリ配下の.DS_Storeを削除
find . -name ".DS_Store" | xargs rm


## 問題

今回はlaravelに同梱されているライブラリ以外を利用する練習問題です

前回PHPDocを記載してみましょうとしてみました。

ですが毎回テーブルのカラム毎に `@property` を書いたりするの面倒ですよね

[laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper) を利用することでコマンド一つでPHPDocを追加できるのでインストールしてみましょう

### 修正箇所

`docker-compose exec ph3-posseapp-app bash`

[Installation](https://github.com/barryvdh/laravel-ide-helper#installation) に記述してあるコマンドをコンテナ内で実行

### 終了条件

- `php artisan list` でide-helperの項目がコマンド一覧に追加されていることを確認

![Sample Image](sample.png)

- +α問題
  - `php artisan ide-helper:models` を実行すると各モデルにテーブルのカラム分の`@property`が追加されることを確認




<!-- ユーザー処理を完結に書く -->
  `use AuthenticatesUsers;`

  <!-- 基本処理を完結に -->
  week41では `Route::resource()` で利用できるルーティングを制限したいのでその対応をお願いします

- `php artisan make:controller UserController --resource` コマンドを実行してアクション一覧を自動生成しました
- web.php に `Route::resource('users', 'UserController');` を記述しました
- `php artisan route:cache` 実行後に `php artisan route:list` でルーティング一覧を確認して反映されていることを確認しました
