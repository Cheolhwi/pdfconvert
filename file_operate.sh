#! /bin/bash

mkdir resource
cd uploads
cp *.pdf ../resource/test.pdf
cd ..
javac -cp fontbox-2.0.1.jar:pdfbox-2.0.1.jar:commons-logging-1.2.jar  *.java
java -classpath fontbox-2.0.1.jar:pdfbox-2.0.1.jar:commons-logging-1.2.jar *.java

