#include <SoftwareSerial.h>   // Incluimos la librería  SoftwareSerial  
SoftwareSerial Bluetooth(10,11);    // Definimos los pines RX y TX del Arduino conectados al Bluetooth
//11 Rx     10Tx

char comando =0;

//Llantas
int llanta_der_1 = 7;
int llanta_der_2 = 6;
int llanta_izq_3 = 5;
int llanta_izq_4 = 4;

int velocidad = 150; //0 - 255
int espera = 2000;
 
void setup(){
  Bluetooth.begin(38400);       // Inicializamos el puerto serie BT (Para Modo AT 2)
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

  if(Bluetooth.available())
  {

    comando = Bluetooth.read();
    Serial.write(comando);
  
    switch (comando){
      case '1':
        avanzar();
        Serial.write(comando);
        break;
      
      case '2':
        reversa();
        break;

      case '3':
        vuelta_derecha();
        break;
      
      case '4':
        vuelta_izquierda();
        break;
      
      default:
        detenerse();
        break;
      
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
  analogWrite(llanta_izq_3, velocidad);
  analogWrite(llanta_izq_4, LOW);

    analogWrite(llanta_der_1, LOW);
  analogWrite(llanta_der_2, velocidad);
}

void vuelta_izquierda(){
  analogWrite(llanta_der_1, velocidad);
  analogWrite(llanta_der_2, LOW);

    analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, velocidad);
}
