# Daikin EKHHE
das Modul erlaubt es folgende Daikin Brauchwasserpumpen der Firma Daikin in Symcon anzubinden.

- EKHHE200CV37
- EKHHE200PCV37
- EKHHE260CV37
- EKHHE260PCV37

### Inhaltsverzeichnis

1. [Funktionsumfang](#1-funktionsumfang)
2. [Voraussetzungen](#2-voraussetzungen)
3. [Software-Installation](#3-software-installation)
4. [Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
5. [Statusvariablen und Profile](#5-statusvariablen-und-profile)
6. [WebFront](#6-webfront)
7. [PHP-Befehlsreferenz](#7-php-befehlsreferenz)

### 1. Funktionsumfang

* Auslesen diverser Daten wie obere/untere Kesseltemperatur, Betriebsmodus, Zustände Digi 1-3 u.v.a.m.

### 2. Voraussetzungen

- IP-Symcon ab Version 8.0

### 3. Software-Installation

* Über den Module Store das 'Daikin EKHHE'-Modul installieren.
* Alternativ über das Module Control folgende URL hinzufügen

### 4. Einrichten der Instanzen in IP-Symcon

 Unter 'Instanz hinzufügen' kann das 'Daikin EKHHE'-Modul mithilfe des Schnellfilters gefunden werden.  
	- Weitere Informationen zum Hinzufügen von Instanzen in der [Dokumentation der Instanzen](https://www.symcon.de/service/dokumentation/konzepte/instanzen/#Instanz_hinzufügen)

__Konfigurationsseite__:

Name     | Beschreibung
-------- | ------------------
		 |
		 |

### 5. Statusvariablen und Profile

Die Statusvariablen/Kategorien werden automatisch angelegt. Das Löschen einzelner kann zu Fehlfunktionen führen.

#### Statusvariablen

Name   | Typ     | Beschreibung
------ | ------- | ------------
	   |         |
	   |         |

#### Profile

Name   | Typ
------ | -------
	   |
	   |

### 6. Visualisierung

Die Funktionalität, die das Modul in der Visualisierung bietet.

### 7. PHP-Befehlsreferenz

`boolean EKHHE_BeispielFunktion(integer $InstanzID);`
Erklärung der Funktion.

Beispiel:
`EKHHE_BeispielFunktion(12345);`