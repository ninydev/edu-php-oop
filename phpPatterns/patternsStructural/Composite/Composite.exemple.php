<?php
/**
 * Любая организация состоит из сотрудников, а сотрудники, в свою очередь,
 * выполняют определенные обязанности, получают заработную плату, могут или
 * не могут иметь в подчинении других сотрудников и т. д. Структурные паттерны Composite
 * объединяют различные объекты в древовидные структуры, позволяя в дальнейшем работать с ними,
 * как с одним объектом.
 */

 /**
  * Здесь представлены разные типы сотрудников:
  */

  interface Employee
{
    public function __construct(string $name, float $salary);
    public function getName(): string;
    public function setSalary(float $salary);
    public function getSalary(): float;
    public function getRoles(): array;
}

class Developer implements Employee
{
    protected $salary;
    protected $name;

    public function __construct(string $name, float $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}

class Designer implements Employee
{
    protected $salary;
    protected $name;

    public function __construct(string $name, float $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}

/**
  * Далее представляем организацию, в которой состоят различные сотрудники:
  */

   class Organization
{
    protected $employees;

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function getNetSalaries(): float
    {
        $netSalary = 0;

        foreach ($this->employees as $employee) {
            $netSalary += $employee->getSalary();
        }

        return $netSalary;
    }
}

 /**
  * Используем:
  */

// Подготовка сотрудников
$john = new Developer('Джон', 12000);
$jane = new Designer('Джейн', 15000);

// Добавляем их в организацию
$organization = new Organization();
$organization->addEmployee($john);
$organization->addEmployee($jane);

echo "Оклад: " . $organization->getNetSalaries(); // Оклад: 22000
