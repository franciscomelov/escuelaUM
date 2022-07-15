#include <SoftwareSerial.h>   // Incluimos la librería  SoftwareSerial  
SoftwareSerial Bluetooth(10,11);    // Definimos los pines RX y TX del Arduino conectados al Bluetooth
//11 Rx     10Tx

char comando =" ";

//Llantas
int llanta_der_1 = 7;
int llanta_der_2 = 6;
int llanta_izq_3 = 5;
int llanta_izq_4 = 4;

int velocidad = 150; //0 - 255
int espera = 2000;
 
void setup(){
  Bluetooth.begin(9600);       // Inicializamos el puerto serie BT (Para Modo AT 2)
  Serial.begin(9600);   // Inicializamos  el puerto serie  

  pinMode(13, OUTPUT);
  
  // inicializar como salidas digitales
  pinMode(llanta_der_1, OUTPUT); 
  pinMode(llanta_der_2, OUTPUT); 
  pinMode(llanta_izq_3, OUTPUT); 
  pinMode(llanta_izq_4, OUTPUT); 

  //Inicializando en lOW
  analogWrite(llanta_der_1, LOW);
  analogWrite(llanta_der_2, LOW);
  analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, LOW);
}
 
void loop(){

    if(Bluetooth.available())    // Si llega un dato por el puerto BT se envía al monitor serial
  {
    comando = Bluetooth.read();
    
      Serial.write(comando);
      if(comando == "arriba"){
        digitalWrite(13, HIGH);
      }
      if(comando == "abajo"){
        digitalWrite(13, LOW);
      }
  

  }



  

}

void avanzar(){
  analogWrite(llanta_der_1, velocidad);
  analogWrite(llanta_der_2, LOW);
  
  analogWrite(llanta_izq_3, velocidad);
  analogWrite(llanta_izq_4, LOW);

}

void reversa(){
  analogWrite(llanta_der_1, LOW);
  analogWrite(llanta_der_2, velocidad);
  
  analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, velocidad);

}

void detenerse(){
   analogWrite(llanta_der_1, LOW);
  analogWrite(llanta_der_2, LOW);
  
  analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, LOW);
}


void vuelta_derecha(){
  // Para girar a la derecha, la llanta izquierda avanza hacia delante y la llanta derecha acanza hacia atras
  analogWrite(llanta_izq_3, velocidad/2);
  analogWrite(llanta_izq_4, LOW);

    analogWrite(llanta_der_1, LOW);
  analogWrite(llanta_der_2, velocidad/2);
}

void vuelta_izquierda(){
  analogWrite(llanta_der_1, velocidad);
  analogWrite(llanta_der_2, LOW);

    analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, velocidad);
}
