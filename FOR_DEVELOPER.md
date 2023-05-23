# 開発者向け情報

開発を始める前にご一読をお願いします。

## 要件資料

### 文書仕様策定書

```
\\mikan\anken\山下PMC\3301020_山下PMC様_コーポレートサイトリニューアル\1_指示書類\文書仕様策定書
```

## 選定概要

| 技術 | 利用の有無 |
| - | - |
| SSG | 11ty（テンプレートエンジン：EJS） |
| Sassのコンパイル | Sass（Dart Sass） |
| JSのバンドル | webpack |
| TypeScript | 〇 |
| 画像の圧縮 | × |
| 画像のwebP化 | × |
| プレコミットフック | 〇(ts,scss) |
| GitLab CI：バリデーションチェック | 〇(vlint) |
| GitLab CI：リポジトリとデモサイトの同期 | 〇 |

## 開発に使用している主要なパッケージについて

### SSG

SSG環境は11tyを使用し、テンプレートエンジンはEJSを利用しています。

- DOCS:[11ty](https://www.11ty.dev/)
- DOCS:[EJS](https://ejs.co/)

### CSS 周辺

scss + PostCSSを使用しています。
一度scssをコンパイルしたファイルを`public/言語/common/css`に書き出してからPostCSSでの処理をおこなっています。

この2つのプロセスは独立しているためnpm scriptの変更時などは実行順に注意してください。

- DOCS:[Scss](https://sass-lang.com/)
- NPM:[sass](https://www.npmjs.com/package/sass)

### JavaScript 周辺

#### ビルド・トランスパイル環境について

TypeScriptを採用しています。

- DOCS:[TypeScript: JavaScript With Syntax For Types.](https://www.typescriptlang.org/)
- [TypeScript: Search for typed packages](https://www.typescriptlang.org/dt/search?search=)

## 作業ルール

### 作業手順について

あくまで原則なので状況によっては順番が左右されるともいますので柔軟に対応をお願いします。

1. 作業ブランチを作成
2. 作成するページを`src/言語/ejs`配下に`*.ejs`形式でファイルを作成する
3. frontMatterに必要な項目を入力する
4. `npm start`でローカルサーバーを立ち上げる（日本語の場合）
5. 実装スタート
   - 作業ブランチに都度コミットプッシュしてください。
   - 途中でモジュールが追加されたりした場合は`develop`ブランチを作業ブランチにマージしてください。
   - デモアップをする場合は`demo`ブランチにマージしてください。
   - `demo`ブランチにマージした際、CIエラーが出ていないか確認してください。エラーが出た場合は`npm run lint`を実行してエラー解消をしてください。
6. 作業が完了したら、チェックを依頼する
   - デザイン、ディレクターチェックはバックログ子課題で依頼をお願いします。
   - コードチェックはマージリクエストで依頼をお願いします。
7. 検品が完了したら、マージリクエストでdevelopにマージする

### メディアファイルについて

画像などのメディアファイルは`src/言語/static/common`に格納してください。

格納されたファイルは`public/言語/common/`にコピーされますので、例を参考にパス指定は公開階層で指定をしてください。
画像の用のディレクトリはhtmlの階層にのっとって作成してください。ディレクトリの作成は第2階層までにとどめ、第3階層以下で使用するファイルも第2階層に格納してください

| 開発階層| 公開階層 |詳細|
| --- | --- | --- |
|`src/言語/static/common/img`|`public/言語/common/img`| *.jpg, *.png, *.svg, *.webp |
|`src/言語/static/common/pdf`|`public/言語/common/pdf`|*.pdf|
|`src/言語/static/common/xls`|`public/言語/common/xls`|*.xls|

#### 例：`company/message.html`で使用する図版画像を格納したときの指定方法

```path
src/言語/static/common/img/company/message-fig-01.jpg
```

↓　公開ディレクトリではこのようにコピーされます

```path
public/言語/common/img/company/message-fig-01.jpg
```

↓ ejsで画像を使うときの指定

```html
<img src="/common/img/company/message-fig-01.jpg" alt="図版の代替テキスト">
```

### TypeScriptについて

型定義ファイルはルート直下の`types`ディレクトリに追加してください。
機能ごとに型定義用ファイルを作成してその中で使用する型を記述してください。
横断的に使用する型については`index.d.ts`に記述してください。

## Gitの使用について

Git-flow + demo ブランチを使用します

### 用意されているブランチと使用方法

#### `main`ブランチ

リリース可能な状態を管理します。

#### `develop`ブランチ

開発ブランチ。マージリクエストを行う場合はこのブランチをターゲットブランチにしてしてください。

#### `feature`ブランチ

各種開発を行うブランチです、命名規則はどのような作業を行っているかがわかるように命名をおこなってください。

ex)新たにヘッダーを追加する場合 `feature/ヘッダー作成` もしくは `feature/ヘッダー修正`など。

#### `demo`ブランチ

社内デモへのリリースを行う場合にマージしてください。マージ後各言語のサイトに自動で反映されます。

### コミットログについて

コミットログは下記のルールでコメントをしてください。

`コミット種別 作業内容`

|コミット種別|詳細|
|---|---|
|fix|修正・更新|
|add|機能・モジュール・ページの追加|
|clean|コード整形（インデント、セミコロンの追加、コメント、linter --fix など）|
|eco|開発環境・ツールの追加・修正|
|docs|ドキュメント更新（README.md、_mlc/**など）|
|remove|削除、廃止|
|revert|変更取り消し|

## ファイル命名について

画像ファイルは原則「種別(_属性(_用途))_連番.拡張子」で命名します。
```
img_01.webp
img_manager_01.webp
img_manager_icon_01.webp
```

種別に関しては[フロントエンドスタイルガイド](https://creators.demo.mitsue.com/fsg/common/)を参照してください。
属性に関しては第3階層以降で使用する場合はディレクトリ名や、画像の持つ属性を参照してください

原則なので例外も認めますが、なるべく原則に従いわかりやすい命名を心がけてください。

## 開発者向けコマンドの説明

| コマンド| 詳細| いつ使うか |
| --- | --- | --- |
| start | 開発環境を立ち上げます（watch:site:jpが実行されます） | 作業に入る前 |
| watch:site:en | 開発環境を立ち上げます（watch:site:jpが実行されます） | 英語サイトの作業に入る前 |
| build | 納品可能なファイルを作成します | 納品ファイルを作るとき |
| lint | 各種構文チェックなどを実行します | CI と同様の内容を手元で確認したいとき |

## ディレクトリ構成について

```txt
/root
┣ public　             | 公開ディレクトリ
┗ src　                | 開発ディレクトリ
  ┣ jp　               | 日本語で使用するファイルを管理
  ┃ ┣ common          | 共通リソースフォルダ
  ┃ ┃ ┣ ts　          | TypeScriptファイル
  ┃ ┃ ┗ scss　        | scssファイル
  ┃ ┣ ejs             | 11ty管理下の各ファイル
  ┃ ┗ static          | 画像ファイルなど公開ディレクトリにコピーするだけのファイルを管理
  ┣ en　               | 英語で使用するファイルを管理
  ┃ ┣ common          | 共通リソースフォルダ
  ┃ ┃ ┣ ts　          | TypeScriptファイル
  ┃ ┃ ┗ scss　        | scssファイル
  ┃ ┣ ejs             | 11ty管理下の各ファイル
  ┃ ┗ static          | 画像ファイルなど公開ディレクトリにコピーするだけのファイルを管理
  ┗ global　           | 日英で共用するファイルを管理
    ┗ common　         | 共通リソースフォルダ
      ┣ ts　           | TypeScriptファイル
      ┗ scss　         | scssファイル
```

原則的には実装時は`src`ディレクトリのみを編集します。
HTML（EJS）のファイルは`src/言語/ejs/`に、画像ファイルなどは`src/言語/static`に配置します。

global配下で行った作業は`public`の`jp`と`en`配下に吐き出されるので基本的には`global`配下のリソースフォルダを使用して、言語ごとに個別のものが必要な場合はそれぞれの配下のリソースフォルダを編集してください。
scssのルートファイルは各言語サイト配下にあります。
