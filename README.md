# Laravel 12 JSON Web Token 起始點

若身分認證成功後，就會為認證令牌簽署、加密，並將其傳遞給用戶端，此時就可以利用 Bearer 作為驗證方案，將認證令牌夾帶在標頭，造訪需要權限的端點，讓服務知道您的身分是合法的。

## 使用方式
- 打開 php.ini 檔案，啟用 PHP 擴充模組 sodium，並重啟服務器。
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __jwt:secret__ 來在 __.env__ 檔案產生 JWT 憑證，若憑證為空值，則被視為不合法身分。
```sh
$ php artisan jwt:secret
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移。
```sh
$ php artisan migrate
```
- 執行 __Artisan__ 指令的 __scribe:generate__ 來執行 API 文件產生。
```sh
$ php artisan scribe:generate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/api/v1/register` 來進行註冊使用者。
- 你可以經由 `/api/v1/login` 來進行使用者登入。
- 你可以經由 `/docs` 來進行應用程式介面文件閱讀。

----

## 畫面截圖
![](https://i.imgur.com/2zjd2DP.png)
> 傳送 HTML 表單資料註冊建立使用者，即可取得認證令牌

![](https://i.imgur.com/aCKCVg2.png)
> 傳送 HTML 表單資料使用建立使用者來做登入，即可取得認證令牌

![](https://i.imgur.com/XqwzPeJ.png)
> 建議找不同領域或程度的開發者來閱讀文件，確認文件的內容適合任何程度的人閱讀
