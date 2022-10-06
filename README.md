Enlaps Test:

Goal
The goal is to write a prototype of one of our microservices we have in production. The role of this microservice is to store pictures coming from our cameras.
Description
Our camera called Tikee has two objectives (left and right). When the Tikee take a shoot, two photos are generated.
The aim is to write an application with the following specifications:
it has a database (sql or nosql), with a table representing the photos.
one endpoint which takes as an input a json message that information about a photo to insert in the database
one endpoint allowing to request photos by the sequence_id , sorted in ascending or descending regarding shooting_date . The response should be a proper json message.
