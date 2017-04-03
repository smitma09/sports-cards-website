import pymysql
import mysql.connector

#How to get sqlalchemy installed...
#from sqlalchemy import create_engine
#from sqlalchemy.ext.declarative import declarative_base
#from sqlalchemy import Column, Integer, String
#from sqlalchemy.orm import sessionmaker
#from sqlalchemy import PrimaryKeyConstraint, ForeignKey

#engine line... See github

Base = declarative_base()

class TwinsPC(Base):
	__tablename__ = 'twinsPC'

	year = Column(Integer)
	cardSet  = Column(String(50))
	cardSubset = Column(String(100))
	playerFirst = Column(String(20))
	playerLast = Column(String(20))
	cardNum = Column(String(20)) #Separate values for prefix and card num? I.e. 100 vs. RA-PD, etc
	auto = Column(Boolean) #Check this and all other boolean columns
	relic = Column(Boolean)
	patch = Column(Boolean)
	manuRelic = Column(Boolean)
	rc = Column(Boolean)
	numbered = Column(Boolean)
	serialFirst = Column(Integer)
	serialLast = Column(Integer)
	oneofone = Column(Boolean)
	hof = Column(Boolean)
	gradedOrSlabbed = Column(Boolean)
	grader = Column(String(20))
	cardGrade = Column(Float) #Don't know if float is a valid type in this situation- Check this and others
	autoGrade = Column(Float)
	authentic = Column(Boolean)
	pathToPicture = Column(String(200))

	def __repr__(self):
		pass

Base.metadata.create_all(engine)
Session = sessionmaker()
Session.configure(bind=engine)
session = Session()

#Helper methods
def isEmpty(table):
	if len(session.query(table).all()) == 0:
		return True
	else:
		return False

def addCardTwinsPC(year, cardSet, cardSubset, playerFirst, playerLast, cardNum, auto, relic, patch, manuRelic, rc, numbered, serialFirst, serialLast, oneofone, hof, gradedOrSlabbed, grader, cardGrade, autoGrade, authentic, pathToPicture):
	if engine.dialect.has_table(engine.connect(), "TwinsPC"):
		newCard = TwinsPC(year=year, cardSet=cardSet, cardSubset=cardSubset, playerFirst=playerFirst, playerLast=playerLast, cardNum=cardNum, auto=auto, relic=relic, patch=patch, manuRelic=manuRelic, rc=rc, numbered=numbered, serialFirst=serialFirst, serialLast=serialLast, oneofone=oneofone, hof=hof, gradedOrSlabbed=gradedOrSlabbed, grader=grader, cardGrade=cardGrade, autoGrade=autoGrade, authentic=authentic, pathToPicture=pathToPicture)
		session.add(newCard)
		session.commit()

def getDataTwinsPC():
	for instance in session.query(TwinsPC):
		#Might need a more elegant way of printing instance (see github)
		print(instance)

def main():
	pass

main()















