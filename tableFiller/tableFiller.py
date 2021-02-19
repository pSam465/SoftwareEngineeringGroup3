import datetime

import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
import time

dbName = 'project'
Tables = {}
Tables['user'] = ("CREATE TABLE `user` ("
                  "  `userID` int(10) NOT NULL ,"
                  "  `email` char(100) NOT NULL,"
                  "  `password` char(200) NOT NULL,"
                  "  `position` varchar(100) NOT NULL,"
                  "  PRIMARY KEY (`userID`)"
                  ") ENGINE=InnoDB")
Tables['equipment'] = ("CREATE TABLE `equipment` ("
                       "  `equipID` int(10) NOT NULL ,"
                       "  `equipType` char(45) NOT NULL,"
                       "  `equipAvailability` tinyint(1) NOT NULL,"
                       "  `equipQuantity` int(200) NOT NULL,"
                       "  `equipName` char(100) NOT NULL,"
                       "  PRIMARY KEY (`equipID`)"
                       ") ENGINE=InnoDB")
Tables['room'] = ("CREATE TABLE `room` ("
                  "  `roomID` int(10) NOT NULL ,"
                  "  `roomType` char(100) NOT NULL,"
                  "  `building` char(100) NOT NULL,"
                  "  `roomNum` int(5) NOT NULL,"
                  "  `roomAvailability` tinyint(1) NOT NULL,"
                  "  PRIMARY KEY (`roomID`)"
                  ") ENGINE=InnoDB")
Tables['equipreservation'] = ("CREATE TABLE `equipreservation` ("
                              "  `eReservationNum` int(50) NOT NULL ,"
                              "  `equipID` int(10),"
                              "  `reservationStart` datetime NOT NULL,"  # TODO startdate & enddate
                              "  `reservationEnd` datetime NOT NULL,"
                              "  `userID` int(10),"
                              "  PRIMARY KEY (`eReservationNum`)"
                              ") ENGINE=InnoDB")
Tables['roomreservation'] = ("CREATE TABLE `roomreservation` ("
                             "  `roomResNum` int(11) NOT NULL ,"
                             "  `roomID` int(11) NOT NULL ,"
                             "  `reservationStart` datetime NOT NULL,"  # TODO startdate & enddate
                             "  `reservationEnd` datetime NOT NULL,"
                             "  `userID` int(11),"
                             "  PRIMARY KEY (roomResNum)"
                             ") ENGINE=InnoDB")
# connection = mysql.connector.connect()
try:
    connection = mysql.connector.connect(host='localhost',
                                         user='root',
                                         password='admin')
    # ensured connection was made before opening files
    cursor = connection.cursor()
    try:
        cursor.execute("USE {}".format(dbName))
    except mysql.connector.Error as err:
        print("Database {} does not exists.".format(dbName))
        if err.errno == errorcode.ER_BAD_DB_ERROR:
            try:
                cursor.execute(
                    "CREATE DATABASE {} DEFAULT CHARACTER SET 'utf8'".format(dbName))
            except mysql.connector.Error as err:
                print("Failed creating database: {}".format(err))
                exit(1)
            print("Database {} created successfully.".format(dbName))
            connection.database = dbName
        else:
            print(err)
            exit(1)
    # creates tables if not already built

    for tableName in Tables:
        tableDescrip = Tables[tableName]
        try:
            print("creating table {}: ".format(tableName), end=" ")
            cursor.execute(tableDescrip)
        except mysql.connector.Error as err:
            if err.errno == errorcode.ER_TABLE_EXISTS_ERROR:
                print('table already exists')
            else:
                print(err.msg)
        else:
            print('ok')
    cursor.close()

    # places user table in db
    f = open('userTable.txt', 'r')
    userData = []
    while True:
        line = f.readline()
        if not line:
            break
        x = (line.split(','))
        x[0] = (int(x[0]))
        x[3] = x[3].rstrip('\n')
        x = tuple(x)
        userData.append(x)
    f.close()
    insert_Query = """ INSERT INTO USER (userID, email, password, position) VALUES (%s, %s, %s, %s)"""
    # not sure if cursor needs to be reopend and closed for every insertion
    cursor = connection.cursor()
    cursor.executemany(insert_Query, userData)
    connection.commit()
    print(cursor.rowcount, "Record inserted successfully into user table")
    cursor.close()

    # Insert equipment data into table
    f = open('equipmentTable.txt', 'r')
    equipData = []
    while True:
        line = f.readline()
        if not line:
            break
        x = (line.split(','))
        x[0] = (int(x[0]))
        x[2] = (int(x[2]))
        x[4] = x[4].rstrip('\n')
        x[3] = (int(x[3]))
        x = tuple(x)
        equipData.append(x)
    f.close()
    insert_Query = """INSERT INTO EQUIPMENT (equipID, equipType, equipAvailability, equipQuantity, equipName) VALUES (%s, %s, %s, %s, %s) """
    # not sure if cursor needs to be reopend and closed for every insertion
    cursor = connection.cursor()
    cursor.executemany(insert_Query, equipData)
    connection.commit()
    print(cursor.rowcount, "Record inserted successfully into equipment table")
    cursor.close()

    f = open('roomTable.txt', 'r')
    roomData = []
    while True:
        line = f.readline()
        if not line:
            break
        x = (line.split(','))
        x[0] = (int(x[0]))
        x[3] = (int(x[3]))
        x[4] = x[4].rstrip('\n')
        x[4] = (int(x[4]))
        x = tuple(x)
        roomData.append(x)
    f.close()
    insert_Query = """INSERT INTO ROOM (roomID, roomType, building, roomNum, roomAvailability) VALUES (%s, %s, %s, %s, %s) """
    # not sure if cursor needs to be reopend and closed for every insertion
    cursor = connection.cursor()
    cursor.executemany(insert_Query, roomData)
    connection.commit()
    print(cursor.rowcount, "Record inserted successfully into Room table")
    cursor.close()

    f = open('roomResTable.txt', 'r')
    roomResData = []
    while True:
        line = f.readline()
        if not line:
            break
        x = (line.split(','))
        x[0] = (int(x[0]))
        x[1] = (int(x[1]))
        x[2] = (datetime.datetime.strptime(x[2], '%Y-%m-%d %H:%M:%S')).strftime('%Y-%m-%d %H:%M:%S')
        x[3] = (datetime.datetime.strptime(x[3], '%Y-%m-%d %H:%M:%S')).strftime('%Y-%m-%d %H:%M:%S')
        x[4] = x[4].rstrip('\n')
        x[4] = (int(x[4]))
        x = tuple(x)
        roomResData.append(x)
    f.close()
    insert_Query = """INSERT INTO roomreservation (roomResNum, roomID, reservationStart, reservationEnd, userID) VALUES (%s, %s, %s, %s, %s) """
    # not sure if cursor needs to be reopend and closed for every insertion
    cursor = connection.cursor()
    cursor.executemany(insert_Query, roomResData)
    connection.commit()
    print(cursor.rowcount, "Record inserted successfully into RoomRes table")
    cursor.close()

    f = open('equipResTable.txt', 'r')
    equipResData = []
    while True:
        line = f.readline()
        if not line:
            break
        x = (line.split(','))
        x[0] = (int(x[0]))
        x[1] = (int(x[1]))
        x[2] = (datetime.datetime.strptime(x[2], '%Y-%m-%d %H:%M:%S')).strftime('%Y-%m-%d %H:%M:%S')
        x[3] = (datetime.datetime.strptime(x[3], '%Y-%m-%d %H:%M:%S')).strftime('%Y-%m-%d %H:%M:%S')
        x[4] = x[4].rstrip('\n')
        x[4] = (int(x[4]))
        x = tuple(x)
        equipResData.append(x)
    f.close()
    insert_Query = """INSERT INTO equipreservation (eReservationNum, equipID, reservationStart, reservationEnd, userID) VALUES (%s, %s, %s, %s, %s) """
    # not sure if cursor needs to be reopend and closed for every insertion
    cursor = connection.cursor()
    cursor.executemany(insert_Query, equipResData)
    connection.commit()
    print(cursor.rowcount, "Record inserted successfully into equiPRes table")
    cursor.close()

    cursor = connection.cursor()
    cursor.execute("""ALTER TABLE `equipreservation` ADD FOREIGN KEY (`equipID`) REFERENCES equipment(`equipID`)""")
    connection.commit()

    cursor = connection.cursor()
    cursor.execute("""ALTER TABLE `equipreservation` ADD FOREIGN KEY (`userID`) REFERENCES user(`userID`)""")
    connection.commit()

    cursor = connection.cursor()
    cursor.execute("""ALTER TABLE `roomreservation` ADD FOREIGN KEY (`userID`) REFERENCES user(`userID`)""")
    connection.commit()

    cursor = connection.cursor()
    cursor.execute("""ALTER TABLE `roomreservation` ADD FOREIGN KEY (`roomID`) REFERENCES room(`roomID`)""")
    connection.commit()
    cursor.close()
except mysql.connector.Error as error:
    print("Failed to insert record into user table {}".format(error))

finally:
    if connection.is_connected():
        cursor.close()
        connection.close()
        print("MySQL connection is closed")
