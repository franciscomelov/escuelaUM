#include <SoftwareSerial.h>   // Incluimos la librería  SoftwareSerial  
SoftwareSerial Bluetooth(10,11);    // Definimos los pines Tx y RX del Arduino conectados al Bluetooth
char comando =0;

//Llantas
int llanta_der_1 = 7;
int llanta_der_2 = 6;
int llanta_izq_3 = 5;
int llanta_izq_4 = 4;

int velocidad = 150; //0 - 255

// Sensor ultrasonico
const int Trigger = 2;   //Pin digital 2 para el Trigger del sensor
const int Echo = 3;   //Pin digital 3 para el Echo del sensor
long t; //timepo que demora en llegar el eco
long d; //distancia en centimetros


void setup(){
  // Inicializamos  el puerto serie 
  Serial.begin(9600);    

  //Bluethooh
  Bluetooth.begin(38400);       // Inicializamos el puerto serie BT (Para Modo AT 2)
  

  //Sensor ultrasonico
  pinMode(Trigger, OUTPUT); //pin como salida
  pinMode(Echo, INPUT);  //pin como entrada
  digitalWrite(Trigger, LOW);//Inicializamos el pin con 0
  pinMode(13, OUTPUT);
  
  // inicializar los pines de control del puente h como salidas e inicializar en LOW
  pinMode(llanta_der_1, OUTPUT); 
  pinMode(llanta_der_2, OUTPUT); 
  pinMode(llanta_izq_3, OUTPUT); 
  pinMode(llanta_izq_4, OUTPUT); 
  analogWrite(llanta_der_1, LOW);
  analogWrite(llanta_der_2, LOW);
  analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, LOW);
}
 
void loop(){

    check_distance();
    //avanzar();

    if(d < 10){
      rutina_evacion();
    }else{
      if(Bluetooth.available()){
      comando = Bluetooth.read();
      //Serial.write(comando);
      switch (comando){
        case '1':
          avanzar();
          break;

        case '2':
          detenerse();
          break;

        case '3':
          vuelta_derecha();
          break;

        case '4':
          vuelta_izquierda();
          break;

        default:
          break;
        };
      }
    }
}


// ***SENSOR ULTRASONICO
void check_distance(){
  digitalWrite(Trigger, HIGH);
  delayMicroseconds(10);          //Enviamos un pulso de 10us
  digitalWrite(Trigger, LOW);

  t = pulseIn(Echo, HIGH); //obtenemos el ancho del pulso
  d = t/59;             //escalamos el tiempo a una distancia en cm

  Serial.print("Distancia: ");
  Serial.print(d);      //Enviamos serialmente el valor de la distancia
  Serial.print("cm");
  Serial.println();
}

void rutina_evacion(){
  int espera = 1000;
  detenerse();
  delay(500);
  reversa();
  delay(500);
  detenerse();
  delay(espera);
  vuelta_derecha();
  delay(espera); 

  avanzar();
}


// *** MOVIMIENTOS DIRECCIONES***

void avanzar(){
  analogWrite(llanta_der_1, LOW);
  analogWrite(llanta_der_2, velocidad);
  
  analogWrite(llanta_izq_3, velocidad);
  analogWrite(llanta_izq_4, LOW);

}

void reversa(){
  analogWrite(llanta_der_1, 128);
  analogWrite(llanta_der_2, LOW);
  
  
  analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, 128);

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

    analogWrite(llanta_der_2, LOW);
  analogWrite(llanta_der_1, 128);
}

void vuelta_izquierda(){
  analogWrite(llanta_der_2, velocidad);
  analogWrite(llanta_der_1, LOW);

    analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, 128);
}
