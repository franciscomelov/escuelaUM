#include <SoftwareSerial.h>
SoftwareSerial Bluetooth(10, 11);

char c=0;
void setup() 
{
  Serial.begin(9600);
  Serial.println("ready");
  Bluetooth.begin(38400);
  pinMode(13, OUTPUT);
}

void loop() 
{
  if(Bluetooth.available())
  {

    c=Bluetooth.read();
    Serial.write(c);
    if(c == '1'){
      digitalWrite(13, HIGH);
    }
        if(c == '2'){
      digitalWrite(13, LOW);
    }

  }

  }
