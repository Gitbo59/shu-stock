import pymysql
import os

conn = pymysql.connect(host= "localhost",
                       user="root",
                       passwd="",
                       db="SHU_DATA",
                       charset='utf8')

x = conn.cursor()

sql = "INSERT INTO products (id, name, price) VALUES (%s, %s, %s)"

with open('prodid.txt') as f:
    for line in f:
        pass
    last_line = line

val = (last_line, 'test', '1.00')
x.execute(sql, val)

conn.commit()

print(x.rowcount, "record inserted.")