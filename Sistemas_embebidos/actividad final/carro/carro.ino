//Llantas
int llanta_der_1 = 7;
int llanta_der_2 = 6;
int llanta_izq_3 = 5;
int llanta_izq_4 = 4;

int velocidad = 150; //0 - 255
 
void setup(){
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

  avanzar();
  delay(3000);

  detenerse();
  delay(3000);

  reversa();
  delay(3000);

  detenerse();
  delay(3000);
}

void avanzar(){
    //Avanza hacia adelante---------
  analogWrite(llanta_der_1, velocidad);
  analogWrite(llanta_der_2, LOW);
  
  analogWrite(llanta_izq_3, velocidad);
  analogWrite(llanta_izq_4, LOW);
  //-------------------------------
}

void reversa(){
    //Avanza hacia atras-----------
  analogWrite(llanta_der_1, LOW);
  analogWrite(llanta_der_2, velocidad);
  
  analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, velocidad);
  //------------------------------
}

void detenerse(){
   analogWrite(llanta_der_1, LOW);
  analogWrite(llanta_der_2, LOW);
  
  analogWrite(llanta_izq_3, LOW);
  analogWrite(llanta_izq_4, LOW);
}
