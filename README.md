# Vintage-Clothes-Exchange

The Vintage Clothes Exchange is a project I am building (in progress) to simulate a e-commerce store for 2nd hand clothes. I'm attempting to build the whole thing without any Javascript.

Users can create an account with just a username and password. Once they are logged in, they can:

   - Create a new listing for a clothing item they want to sell
   - Add money to their account - fake money for this project, of course ;)
   - browse all listings, or filter by type
   - buy a product, which will close the product listing, add it to the user's list of past purchases, and deduct the amount from the credit on their account
        
A user that is not logged in can only browse, they cannot add any items to sell.

***The project is built with an OOP approach.***

Most products properties and methods are the same, and are shared in an abstract parent class. The parent abstact class is extended to make other abstract classes for product types, which are also extended to make instantiatable classes for each product type and gender. These classes were neccassary because the sizing system for mens and womens clothes are different for each other (in the UK at least).

Here are some image from the project:

<img width="1358" alt="image" src="https://user-images.githubusercontent.com/22756687/224577125-61e2a839-6068-4d4e-861c-bb6193ff4b07.png">


<img width="1352" alt="image" src="https://user-images.githubusercontent.com/22756687/224577166-3c39812b-3a3d-41f1-b2ec-2f335303f11a.png">


<img width="1253" alt="image" src="https://user-images.githubusercontent.com/22756687/224577182-f7f0e5d0-cda4-43b1-920b-7c35ba2fa2eb.png">

<img width="1251" alt="image" src="https://user-images.githubusercontent.com/22756687/224577199-f3ecee54-f9f2-4471-aaca-ffa2c2e02e4c.png">
