<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function() {
        return redirect('/admin');
    });

    Route::get('/admin', 'HomeController@index')->name('home');

    Route::get('/admin/profile', 'HomeController@adminProfile')->name('admin.profile');

    Route::get('/admin/profile/{id}/edit', 'HomeController@editAdminProfile')->name('admin.edit');

    Route::post('/admin/profile/edit', 'HomeController@updateAdminProfile')->name('admin.update');

/////////////////////USERS MODULE/////////////////////////////////////////

    Route::get('/Users', 'UserController@allUsers')->name('users.all');

    Route::get('/Users/View/{id}', 'UserController@userDetails')->name('users.detail');

    Route::get('/User/Delete/{id}', 'UserController@userDelete')->name('users.delete');



////////////////////CATEGORY CONTROLLER////////////////////////////////////////

    Route::get('/Categories', 'CategoryController@allCategorires')->name('category.all');

    Route::get('/Categories/Add', 'CategoryController@addCategoryForm')->name('category.add');

    Route::post('/Categories/Add', 'CategoryController@insertCategory')->name('category.insert');

    Route::get('/Categories/View/{id}', 'CategoryController@detailCategory')->name('category.detail');

    Route::get('Categories/Edit/{id}', 'CategoryController@editCategoryForm')->name('category.edit');

    Route::post('Categories/Edit', 'CategoryController@updateCategory')->name('category.update');

    Route::get('/Categories/Delete/{id}', 'CategoryController@deleteCategory')->name('category.delete');

    Route::post('/Categories/BulkDelete', 'CategoryController@bulkDeleteCategories')->name('category.bulkDelete');


////////////////////Video CONTROLLER////////////////////////////////////////

    Route::get('/Videos', 'VideoController@allVideos')->name('video.all');

    Route::get('/Video/Add', 'VideoController@addVideoForm')->name('video.add');

    Route::post('/Video/Add', 'VideoController@insertVideo')->name('video.insert');

    Route::get('/Video/View/{id}', 'VideoController@detailVideo')->name('video.detail');

    Route::get('Video/Edit/{id}', 'VideoController@editVideoForm')->name('video.edit');

    Route::post('Video/Edit', 'VideoController@updateVideo')->name('video.update');

    Route::get('/Video/Delete/{id}', 'VideoController@deleteVideo')->name('video.delete');

    Route::post('/Videos/BulkDelete', 'VideoController@bulkDeleteVideos')->name('video.bulkDelete');


////////////////////Article CONTROLLER////////////////////////////////////////

    Route::get('/Articles', 'ArticleController@allArticles')->name('article.all');

    Route::get('/Article/Add', 'ArticleController@addArticleForm')->name('article.add');

    Route::post('/Article/Add', 'ArticleController@insertArticle')->name('article.insert');

    Route::get('/Article/View/{id}', 'ArticleController@detailArticle')->name('article.detail');

    Route::get('Article/Edit/{id}', 'ArticleController@editArticleForm')->name('article.edit');

    Route::post('Article/Edit', 'ArticleController@updateArticle')->name('article.update');

    Route::get('/Article/Delete/{id}', 'ArticleController@deleteArticle')->name('article.delete');

    Route::post('/Articles/BulkDelete', 'ArticleController@bulkDeleteArticles')->name('article.bulkDelete');



////////////////////Book CONTROLLER////////////////////////////////////////

    Route::get('/Books', 'BookController@allBooks')->name('book.all');

    Route::get('/Book/Add', 'BookController@addBookForm')->name('book.add');

    Route::post('/Book/Add', 'BookController@insertBook')->name('book.insert');

    Route::get('/Book/View/{id}', 'BookController@detailBook')->name('book.detail');

    Route::get('Book/Edit/{id}', 'BookController@editBookForm')->name('book.edit');

    Route::post('Book/Edit', 'BookController@updateBook')->name('book.update');

    Route::get('/Book/Delete/{id}', 'BookController@deleteBook')->name('book.delete');

    Route::post('/Books/BulkDelete', 'BookController@bulkDeleteBooks')->name('book.bulkDelete');

    Route::get('/Book/Preview/{id}', 'BookController@bookPreview')->name('book.preview');

////////////////////Questionnaire CONTROLLER////////////////////////////////////////

    Route::get('/Questionnaires', 'QuestionnaireController@allQuestionnaires')->name('questionnaire.all');

    Route::get('/Questionnaire/Add', 'QuestionnaireController@addQuestionnaireForm')->name('questionnaire.add');

    Route::post('/Questionnaire/Add', 'QuestionnaireController@insertQuestionnaire')->name('questionnaire.insert');

    Route::get('/Questionnaire/View/{id}', 'QuestionnaireController@detailQuestionnaire')->name('questionnaire.detail');

    Route::get('Questionnaire/Edit/{id}', 'QuestionnaireController@editQuestionnaireForm')->name('questionnaire.edit');

    Route::post('Questionnaire/Edit', 'QuestionnaireController@updateQuestionnaire')->name('questionnaire.update');

    Route::get('/Questionnaire/Delete/{id}', 'QuestionnaireController@deleteQuestionnaire')->name('questionnaire.delete');

    Route::post('/Questionnaires/BulkDelete', 'QuestionnaireController@bulkDeleteQuestionnaires')->name('questionnaire.bulkDelete');


////////////////////Quotation CONTROLLER////////////////////////////////////////

    Route::get('/Quotations', 'QuotationController@allQuotations')->name('quotation.all');

    Route::get('/Quotation/Add', 'QuotationController@addQuotationForm')->name('quotation.add');

    Route::post('/Quotation/Add', 'QuotationController@insertQuotation')->name('quotation.insert');

    Route::get('/Quotation/View/{id}', 'QuotationController@detailQuotation')->name('quotation.detail');

    Route::get('Quotation/Edit/{id}', 'QuotationController@editQuotationForm')->name('quotation.edit');

    Route::post('Quotation/Edit', 'QuotationController@updateQuotation')->name('quotation.update');

    Route::get('/Quotation/Delete/{id}', 'QuotationController@deleteQuotation')->name('quotation.delete');

    Route::post('/Quotations/BulkDelete', 'QuotationController@bulkDeleteQuotations')->name('quotation.bulkDelete');


////////////////////Success Story CONTROLLER////////////////////////////////////////

    Route::get('/Success-Stories', 'SuccessStoryController@allSuccessStories')->name('story.all');

    Route::get('/Success-Story/View/{id}', 'SuccessStoryController@detailSuccessStory')->name('story.detail');

    Route::get('Success-Story/Edit/{id}', 'SuccessStoryController@editSuccessStoryForm')->name('story.edit');

    Route::post('Success-Story/Edit', 'SuccessStoryController@updateSuccessStory')->name('story.update');

    Route::get('/Success-Story/Delete/{id}', 'SuccessStoryController@deleteSuccessStory')->name('story.delete');

    Route::post('/Success-Story/BulkDelete', 'SuccessStoryController@bulkDeleteSuccessStories')->name('story.bulkDelete');

////////////////////SETTINGS////////////////////////////////////////////////////

////////////////////Banner CONTROLLER////////////////////////////////////////

    Route::get('/Banners', 'BannerController@allBanners')->name('banner.all');

    Route::get('/Banner/Add', 'BannerController@addBannerForm')->name('banner.add');

    Route::post('/Banner/Add', 'BannerController@insertBanner')->name('banner.insert');

    Route::get('/Banner/View/{id}', 'BannerController@detailBanner')->name('banner.detail');

    Route::get('Banner/Edit/{id}', 'BannerController@editBannerForm')->name('banner.edit');

    Route::post('Banner/Edit', 'BannerController@updateBanner')->name('banner.update');

    Route::get('/Banner/Delete/{id}', 'BannerController@deleteBanner')->name('banner.delete');

    Route::post('/Banners/BulkDelete', 'BannerController@bulkDeleteBanners')->name('banner.bulkDelete');

////////////////////Language CONTROLLER////////////////////////////////////////

    Route::get('/Languages', 'LanguageController@allLanguages')->name('language.all');

    Route::get('/Language/Add', 'LanguageController@addLanguageForm')->name('language.add');

    Route::post('/Language/Add', 'LanguageController@insertLanguage')->name('language.insert');

    Route::get('/Language/View/{id}', 'LanguageController@detailLanguage')->name('language.detail');

    Route::get('Language/Edit/{id}', 'LanguageController@editLanguageForm')->name('language.edit');

    Route::post('Language/Edit', 'LanguageController@updateLanguage')->name('language.update');

    Route::get('/Language/Delete/{id}', 'LanguageController@deleteLanguage')->name('language.delete');

    Route::post('/Languages/BulkDelete', 'LanguageController@bulkDeleteLanguages')->name('language.bulkDelete');

    
    
    
    });


