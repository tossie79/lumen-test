# PHP Lumen Test

This is a PHP test that will help show your knowledge with creating APIs and dealing with videos.

## Setup guides

### If you're comfortable with git...

1. Fork it
2. Clone it
3. Commit changes to your own fork
4. Send link of your repo, and we will clone (or download) it for review.

### If you're not comfortable with git...

1. Click "Downloads"
2. Click "Download repository"
3. Make changes
4. Once finished, zip it up and send via email

# The Task

Your task is to create a simple API application using the Lumen Framework. The API should have a single endpoint, but should be written with future endpoints in mind. 

The endpoint you must implement should do as follows: 

1. Only accept ``POST`` requests.
2. Be versioned (How you version the API is up to you).
3. Recieve a video file (via multipart/form-data), which should be saved locally. 
4. Use ``getID3`` to process the ``video`` file.
5. Return the analyzed data from ``getID3`` as JSON.

# Considerations

When writing your application, you should consider the following.

1. Make sure you are following the SOLID principles.
2. Make sure your following styling standards like PSR-2.
3. Write tests using ``PHPUnit``.
4. Use TDD to help you write clean and testable code.

# Submitting

Once you have completed, you can submit it by creating a public repository on github (or a like) and provide us with a link.

# Help

1. https://github.com/JamesHeinrich/getID3
2. https://lumen.laravel.com/docs/5.4
3. https://lumen.laravel.com/docs/5.4/responses#json-responses
4. https://lumen.laravel.com/docs/5.4/requests#files
5. https://github.com/JamesHeinrich/getID3/blob/master/structure.txt
6. https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
7. https://lumen.laravel.com/docs/5.4/testing
8. https://en.wikipedia.org/wiki/SOLID_(object-oriented_design)