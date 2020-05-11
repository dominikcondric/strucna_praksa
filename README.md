# Readme


# Opis

Potrebno je u Laravelu napraviti ticketing sustav.

## Što je ticket + primjer 

Ticket je u poslovnom svijetu, jednostavno rečeno, nešto poput zadatka. 

Npr. zovete A1 jer smatrate da vam je račun za mobitel 
došao previsok.

Kada nazovete A1, sa druge strane vam se javi agent koji vas sasluša
i u sustavu otvori ticket. Ticket mora imati svoj naziv kako bi drugi
zaposlenici iz A1 znali o čem se radi. To može biti npr. "Račun za 
mobitel". Uz to je potrebno da se zna tko je podnio ticket kako bi 
znali kome se javiti jednom kada se problem riješi (ili ako su potrebne
dodatne informacije). Zadnje što je potrebno je da ticket ima osobu 
koja je zadužena za taj ticket, tj. tko je odgovoran da riješi 
korisnikov problem (to može biti jedna ili više osoba). 

Kad agent zaprimi vaš poziv, otvoriti će ticket na vaše ime naziva
"Račun za mobitel" i zadužiti će na njega nekog iz računovodstva da 
provjeri o čem se radi. Jednom kad računovodstvo provjeri i vidi 
da je račun opravdan (npr. dobili ste veći račun jer ste taj mjesec
zvali nekog u inozemstvu), prezadužiti će taj ticket na recimo
šefa financija da vam se zbog toga što ste dugogodišnji korisnik ipak 
izađe na ruku i da popust. U tom trenutku šef financija prezaduži
ticket natrag na agenta koji vas obavijesti o dobrom ishodu i zatvori 
ticket. 

Primjera može biti beskonačno: zvali ste HEP jer vam je nestalo struje,
zvali ste banku jer vam je istekao mobilni token za m-banking, zvali
ste osiguravajuće društvo jer vas je na parkiralištu netko udario,
zvali ste Ri-stan jer vam nisu poslali račun za ovaj mjesec, zvali
ste Tele2 jer želite otkazati ugovor...sve su to validni razlozi za 
otvaranje novog ticketa, koji će ovisno o načinu poslovanja zahtjevati
razne korake da se dođe do rješavanja ticketa. 

Za sve ostalo: [ovaj link](https://lmgtfy.com/?q=ticketing+system)

## Zadatak

Vaš zadatak je napraviti jednostavan ticketing sustav. Iako je ovaj 
readme na HR, codebase (sve varijable, metode, modeli, baza itd.) 
mora obavezno biti na EN. 

Bazu ćete složiti sami na način koji vam najviše ima smisla, međutim neke smjernice su 
da obavezno imate 4 modela: 

```
User        <- korisnik sustava tj. agent. Ovo NIJE osoba koja zove
Ticket      <- ticket
State       <- stanje ticketa (npr. otvoren, zadužen, zatvoren...)
Comment     <- komentari usera na ticket (npr. napravio sam to i to, prezadužio na tog i tog)
```

Slobodni ste proširiti ovo na način da dodate nove modele koji vam
imaju smisla, ali neka to bude max onda 4 modela ekstra (dakle 8 ukupno).

Nekakav okviran plan razvoja:

- izrada migracija kako bi složili bazu
- izrada modela
- izrada relacija među modelima
- izrada kontrolera za akcije koje se mogu izvršiti nad modelima. Očekuje
se da za svaki model podržavate tzv. CRUD (Create, Read, Update, Delete)
operacije zajedno sa updateom relacija koje ti modeli na sebi imaju.
- izrada bazičnog viewa
- održavanje readme fajla ažurnim (što ste radili, s čim ste imali problema)

Dodatno (nije potrebno, ali ako budete turbo brzi):

- Upotreba nekog CSS frameworka da cijela priča izgleda ljepše

