/**
 * candidate: Toan Nguyen
 * email: n.minhtoan
 */
/*
Bernice from accounting has lost her print out of what her employees addresses are. Luckily you have them stored in your MySQL database. Write a query that will get Bernice a new list with each employee's full name and their current address.

Your database looks like this

Employees
employeeID, firstName, lastName, ...

Addresses
addressID, employeeID, address, city, provinceID, postalCode, movedInDate, ...

Provinces
provinceID, province, ...
*/

SELECT CONCAT(Employees.firstName, " ", Employees.firstName) as FullName, 
  Addresses.address, Addresses.city, Provinces.province, Addresses.postalCode, 
  FROM Employees
  JOIN Addresses ON Addresses.employeeID = Employees.employeeID
  JOIN Provinces ON Addresses.provinceID = Provinces.provinceID