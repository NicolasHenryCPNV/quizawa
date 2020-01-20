# Add a new table with relation
In this document we will make the process to add a table like image_quizzs

1. `php artisan make:migration create_image_quizzs_table` To create a migration, you can edit it to add specific column see [file](https://github.com/NicolasHenryCPNV/quizawa/commit/3b390b40c9d1b1e2cf23f9d1fba75719f691726c)
2. `php artisan make:model ImageQuizz` To generate the [model](https://github.com/NicolasHenryCPNV/quizawa/blob/b720790db85cebad63399b4e19062c269f89aafb/app/ImageQuizz.php)
3. In our case we will add fake data with faker, so we need to use a [factory](https://github.com/NicolasHenryCPNV/quizawa/blob/b720790db85cebad63399b4e19062c269f89aafb/database/factories/ImageQuizzFactory.php) to use it `php artisan make:factory ImageQuizzFactory --model=ImageQuizz` you can add a parameter to link on our model.
4. To use the factory, we will use a [seeder](https://github.com/NicolasHenryCPNV/quizawa/blob/b720790db85cebad63399b4e19062c269f89aafb/database/seeds/ImageQuizzsTableSeeder.php) to generate the data when we migrate the db `php artisan make:seeder ImageQuizzsTableSeeder`, we call the factory created before.
5. Add your relation on the correct models to use them later.
   
You can see a generic [commit](https://github.com/NicolasHenryCPNV/quizawa/commit/b720790db85cebad63399b4e19062c269f89aafb) to all about that (some element are not present in this commit)