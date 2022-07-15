const int Trigger = 2;   //Pin digital 2 para el Trigger del sensor
const int Echo = 3;   //Pin digital 3 para el Echo del sensor
long t; //timepo que demora en llegar el eco
long d; //distancia en centimetros

int led=13;

void setup() {
  Serial.begin(9600);//iniciailzamos la comunicación
  pinMode(Trigger, OUTPUT); //pin como salida
  pinMode(Echo, INPUT);  //pin como entrada
  digitalWrite(Trigger, LOW);//Inicializamos el pin con 0

  pinMode(led, OUTPUT);
  digitalWrite(led, LOW);
}

void loop()
{

  check_distance();

    if(d < 10){
      digitalWrite(led, HIGH);
 
  }else{
    digitalWrite(led, LOW);
  }


  


  delay(100);          //Hacemos una pausa de 100ms
}

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
