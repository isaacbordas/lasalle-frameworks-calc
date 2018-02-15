mpwar-frameworks
================

Entregables Frameworks

Entregable 1 'task-enhanced-calculator'
https://github.com/isaacbordas-lasalle/symfony_mpwar/releases/tag/task-enhanced-calculator

Operación 1: Suma por GET
/add/5/3/

Operación 2: Resta por GET. Ruta por Annotations
/subtract/10/6/

Operación 3: Multiplicación 1 parámetro por la URI, otro parámetro por query string.
/multiply/5/?param2=3

Operación 4: División por POST
Mediante Insomnia petición POST: /divide/
Query: param1 : 10 param2 : 3
URL: /divide/?param1=10&param2=3