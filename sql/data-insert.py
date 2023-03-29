import pymysql
import os

conn = pymysql.connect(host= "localhost",
                       user="root",
                       passwd="",
                       db="SHU_DATA",
                       charset='utf8')

x = conn.cursor()

with open('prodid.txt') as f:
        for line in f:
            pass
        last_line = line

def insert(last_line):
    query = "INSERT INTO products (id, name, price) VALUES (%s, %s, %s)"
    val = (last_line, 'testing', '1.00')
    return query, val

def delete(last_line):
    query = "DELETE FROM products WHERE id = %s"
    val = (last_line)
    
    return (query, val)
    
print(delete(last_line))
x.execute(delete(last_line))


conn.commit()

print(x.rowcount, "record inserted.")