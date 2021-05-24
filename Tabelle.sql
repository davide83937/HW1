use esame;

CREATE TABLE COOKIES(

Cliente VARCHAR(255),
Id INTEGER,
Has VARCHAR(255),
Tempo INTEGER,

INDEX idx109(Cliente),

FOREIGN KEY (Cliente) REFERENCES CLIENTE(Id_Cliente)

)Engine = "InnoDB";


CREATE TABLE CLIENTE(

Id_Cliente VARCHAR(255) PRIMARY KEY,
Nome VARCHAR(255),
Cognome VARCHAR(255),
Pass VARCHAR(255),
Email VARCHAR(255),
Cap INTEGER,
Via VARCHAR(255),
Numero INTEGER

)Engine="InnoDB";



CREATE TABLE ACQUISTO(

Cliente VARCHAR(255),
Componente INTEGER,
Id_Acquisto INTEGER AUTO_INCREMENT PRIMARY KEY,
Data_ DATE ,
INDEX idx1(Cliente),
INDEX idx2(Componente),
UNIQUE(Cliente, Id_Acquisto, Componente)

)Engine="InnoDB";


CREATE TABLE ACQUISTO_PASSATO(

Cliente VARCHAR(255),
Componente INTEGER,
Id_Acquisto INTEGER AUTO_INCREMENT PRIMARY KEY,
Data_ DATE,
Data_Consegna DATE,
INDEX idx1(Cliente),
INDEX idx2(Componente),
UNIQUE(Cliente, Id_Acquisto, Componente),
FOREIGN KEY (Cliente) REFERENCES CARRELLO(Cliente),
FOREIGN KEY (Componente) REFERENCES CARRELLO(Componente)

)Engine="InnoDB";




CREATE TABLE COMPONENTE(

Nome VARCHAR(255) PRIMARY KEY,
Produttore VARCHAR(255),
Tipologia VARCHAR(255),
Anno_Uscita INTEGER

)Engine="InnoDB";

CREATE TABLE VERSIONE_COMPONENTE(

Id_Versione INTEGER,
Nome VARCHAR(255),
Nome_Modello VARCHAR(255),
Prezzo FLOAT,
Descrizione VARCHAR(1000),
Immagine VARCHAR(255),
Quantita_Componente INTEGER,
Quantita_venduta INTEGER,
PRIMARY KEY(Id_Versione, Nome),
INDEX idx56(Nome),
FOREIGN KEY (Nome) REFERENCES COMPONENTE(Nome)

)Engine="InnoDB";




CREATE TABLE PREFERITI(
Username VARCHAR(255),
Nome VARCHAR(255),

PRIMARY KEY(Username, Nome),
INDEX idx58(Username),
INDEX idx56(Nome),
FOREIGN KEY (Username) REFERENCES CLIENTE(Id_Cliente),
FOREIGN KEY (Nome) REFERENCES VERSIONE_COMPONENTE(Nome)
)Engine="InnoDB";


CREATE TABLE CARRELLO(

Id_Inserimento INTEGER AUTO_INCREMENT,
Cliente VARCHAR(255),
Componente INTEGER,
INDEX idx5(Componente),
PRIMARY KEY(Id_Inserimento, Componente, Cliente),
FOREIGN KEY (Cliente) REFERENCES CLIENTE(Id_Cliente),
FOREIGN KEY (Componente) REFERENCES VERSIONE_COMPONENTE(Id_Versione)

)Engine="InnoDB";


INSERT INTO COMPONENTE VALUES('RTX 2060 SUPER', 'NVIDIA','GPU',2019);
INSERT INTO COMPONENTE VALUES('RTX 3080', 'NVIDIA', 'GPU', 2020);
INSERT INTO COMPONENTE VALUES('RX 580', 'AMD', 'GPU', 2016);
INSERT INTO COMPONENTE VALUES('RX 6800', 'AMD', 'GPU', 2020);
INSERT INTO COMPONENTE VALUES('RYZEN 5 3600', 'AMD', 'CPU', 2019);
INSERT INTO COMPONENTE VALUES('INTEL i5 4790', 'INTEL', 'CPU', 2015);
INSERT INTO COMPONENTE VALUES('B450M', 'MSI', 'MOTHERBOARD', 2018);
INSERT INTO COMPONENTE VALUES('HYPERX', 'KINGSTONE', 'RAM', 2017);
INSERT INTO COMPONENTE VALUES('ROG', 'ASUS', 'GPU', 2016);
INSERT INTO COMPONENTE VALUES('PENTIUM 4 570', 'INTEL', 'CPU', 2005);


INSERT INTO VERSIONE_COMPONENTE VALUES(1,'RTX 2060 SUPER', 'Aorus', 429.39, 
'La NVIDIA® GeForce® RTX 2060 SUPER™ si basa sulla architettura NVIDIA Turing™, 
portando prestazioni ultra veloci e una grafica straordinaria nelle mani di ogni giocatore e creativo. 
È ora di accendere i motori e ottenere i super poteri.'
,'2060super.jpg', 10, 5);

INSERT INTO VERSIONE_COMPONENTE VALUES(2,'RTX 3080', 'Gigabyte OC', 829.45,
'GeForce RTX™ 3080 offre le prestazioni strabilianti che tutti i giocatori vorrebbero, grazie ad Ampere:
 l architettura RTX NVIDIA di 2a generazione. È costruita con core RT e Tensor Core potenziati, nuovi multiprocessori
 di streaming e una memoria G6X superveloce, il tutto per offrirti una straordinaria esperienza di gioco.',
 'RTX_3080_Ti.jpg', 10, 5);
 
INSERT INTO VERSIONE_COMPONENTE VALUES(3,'RX 580', 'Zotac OC', 100.67,
'Descrizione: 8gb xfx radeon rx 580 gts xxx edizione oc, 14nm polaris, 2304 stream, 1366mhz boost, 8000mhz gddr5, 3xdp, HDMI, dvi-d, smooth 1440p negli ultimi giochi AAA.',
 'rx580.jpg', 10, 6);
INSERT INTO VERSIONE_COMPONENTE VALUES(4,'RX 6800', 'Asus TUF', 750.43,
'La scheda grafica AMD Radeon ™ RX 6800 XT, basata sull architettura AMD RDNA ™ 2, con 72 potenti unità di elaborazione migliorate,
 128 MB di tutte le nuove AMD Infinity Cache e 16 GB di memoria GDDR6 dedicata, è progettata per offrire frame rate elevatissimi e seri
 giochi con risoluzione 4K.',
 '6800XT.jpg', 12, 5);
INSERT INTO VERSIONE_COMPONENTE VALUES(5,'RYZEN 5 3600', 'XT', 210.99,
'AMD 3600, Ryzen. Famiglia processore: AMD Ryzen 5, Frequenza del processore: 3,6 GHz, Presa per processore: Presa AM4. 
Canali di memoria supportati dal processore: Doppio, Tipologie di memoria supportati dal processore: DDR4-SDRAM, 
Velocità memory clock supportate dal processore: 3200 MHz. Thermal Design Power (TDP): 65 W. configurazione PCI Express: 1x16',
 'ryzen5-3600.jpg', 10, 5);
INSERT INTO VERSIONE_COMPONENTE VALUES(6,'INTEL i5 4790', 'K', 110.65,
' I processori Intel Core i7 con tecnologia multi-core intelligente più veloce che applica la potenza di elaborazione dove è più
 necessario, un incredibile passo avanti in termini di prestazioni del PC. Essi sono i migliori processori desktop del pianeta Zeiten.
 ??Erleben voi più veloce e multitasking creare un supporto digitale impressionante. E attraverso la combinazione di tecnologia Intel 
 Turbo Boost e Intel Hyper-Threading (tecnologia Intel HT), che si sviluppa la potenza di elaborazione completa esattamente dove ne hai 
 più bisogno, è possibile in tutto ciò che fate sul vostro PC, contare sulla potenza massima.',
 'i7-4790K.jpg', 10, 5);
INSERT INTO VERSIONE_COMPONENTE VALUES(7,'B450M', 'A-PRO', 90.67,
'Scheda madre AMD AM4 ispirata al design architettonico, con Core Boost, DDR4 Boost, Turbo M.2.
Supporta AMD Ryzen / Ryzen di prima, seconda e terza generazione con grafica Radeon Vega e AMD 
Ryzen di seconda generazione con grafica Radeon / Athlon con processori desktop grafici Radeon 
Vega per Socket AM4.',
 'B450Mpro.jpg', 10, 5);
INSERT INTO VERSIONE_COMPONENTE VALUES(8,'HYPERX', 'PREDATOR', 82.12,
'Grazie alla loro velocità, le HyperX Predator DDR4 RGB rappresentano l evoluzione ottima per i gamer che desiderano 
impreziosire i propri sistemi AMD o Intel con prestazioni sbalorditive e con lo stile dell RGB. Il dinamismo degli effetti 
di luce RGB sfrutta la tecnologia brevettata HyperX Infrared Sync, che genera emissioni luminose sincronizzate di impatto. 
Porta ad alto il frame rate, per assicurarti trasmissioni ottime o dedicarti all editing dei tuoi spezzoni, grazie a velocità
 che arrivano a 4600MHz¹ e ai tempi di latenza record CL15–CL19. Sconfiggi il caldo e semina il panico nell anima dei tuoi avversari 
 grazie allo stile aggressivo del dissipatore di calore nero e del PCB abbinato in nero.',
 'HyperX.jpg', 10, 5);
INSERT INTO VERSIONE_COMPONENTE VALUES(9,'ROG', 'THOR-1200P', 101.55,
'ROG THOR 1200P, Unità di alimentazione Platinum da 1200W con Aura Sync e display OLED, ATX 12V - Efficiency: 80Plus Platinum At 
20%/50%/100% load AC 115V 60Hz and AC 230V 50Hz, the power efficiency is 90%/92%/89%. - Protection Feautures: OPP/OVP/SCP/OCP/OTP - 
Hazardous Materials: ROHS - AC Input Range: 100-240Vac - RGB Connector: Compatible with ASUS Aura Sync - DC Output Voltage: +3.3V +5V 
+12V -12V +5Vsb - Maximum Load: 25A 25A 100A 0.3A 3A - Total Output: 1200W - Dimensions: 19 x 15 x8.6 Centimeter.'
, 'ROG-THOR-1200P.jpg', 10, 5);
INSERT INTO VERSIONE_COMPONENTE VALUES(10,'PENTIUM 4 570', 'Classic', 5.89,
'Inutile',
 'pentium_4_570.jpg', 10, 5);




