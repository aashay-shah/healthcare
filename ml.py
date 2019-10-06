
from warnings import simplefilter
simplefilter(action='ignore', category=FutureWarning)


import pandas as pd
import numpy as np


df = pd.read_csv('framingham.csv')


df.drop('glucose',axis=1,inplace=True)
df.dropna(axis=0,inplace=True)


from sklearn.model_selection import train_test_split


x=df.drop('TenYearCHD',axis=1)
Y=df['TenYearCHD']
X_train,X_test,y_train,y_test = train_test_split(x,Y,test_size=0.2)



from sklearn.linear_model import LogisticRegression


mod2 = LogisticRegression()
mod2.fit(X_train,y_train)


predictions2= mod2.predict(X_test)
from sklearn.metrics import classification_report,confusion_matrix
'''print(type(X_train.loc[0]))
print(classification_report(y_test,predictions2))
print(confusion_matrix(y_test,predictions2))'''
lst = input("..").split()
lst = [float(i) for i in lst ]
dfphp = pd.Series(data=lst,index= X_test.columns).to_frame().transpose()
predicted = mod2.predict(dfphp)


import csv


with open('empty.csv', 'w+') as writeFile:
    writer = csv.writer(writeFile)
    writer.writerow(predicted)

print(predicted[0])