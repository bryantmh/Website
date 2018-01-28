<?php

const $MONTH31 = 31;
const $MONTH30 = 30;
const $FEBRUARY = 28
const $LEAPFEBRUARY = 29;
const $YEAR1 = 1582;
const $LEAPYEAR = 4;
const $LEAPCENTURY = 400;
const $LEAPCENTURYTEST = 100;
const $DAYSPERWEEK = 7;

// Declare variables
$month1;
$month2;
$day1;
$day2;
$year1;
$year2;
$int_year1 = -1;
$int_year2 = -1;
$int_day1 = -1;
$int_day2 = -1;
$monthReturn1 = -1;
$monthReturn2 = -1;
$totalDays = 0;
$selection = -1;

		// Enter the two dates
		do
		{
			echo "Please enter a date (Month D[D], YYYY): ";
			cin >> month1;
			cin >> day1;
			cin >> year1;
			// Calls functions to validate input
			monthReturn1 = checkMonth(month1);
			int_year1 = checkYear(year1);
			int_day1 = checkDay(day1, month1, int_year1);
		} while (monthReturn1 == -1 || int_year1 == -1 || int_day1 == -1);
		//echo "You entered: " << month1 << " " << int_day1 << ", " << int_year1 << " as your first date." << endl << endl;

		do
		{
			echo "Please enter a second date (Month D[D], YYYY): ";
			cin >> month2;
			cin >> day2;
			cin >> year2;
			// Calls functions to validate input
			monthReturn2 = checkMonth(month2);
			int_year2 = checkYear(year2);
			int_day2 = checkDay(day2, month2, int_year2);
		} while (monthReturn2 == -1 || int_year2 == -1 || int_day2 == -1);
		//echo "You entered: " << month2 << " " << int_day2 << ", " << int_year2 << " as your second date." << endl << endl;

		// Calculate number of days in between the dates
		string firstMonthLower = monthToLower(month1);
		string secondMonthLower = monthToLower(month2);
		int int_firstMonth = monthCode(firstMonthLower), int_secondMonth = monthCode(secondMonthLower);

		// Checks which is the later year, and runs the program accordingly
		if (year1 < year2)
		{
			totalDays = calculateDays(int_firstMonth, int_secondMonth, int_year1, int_year2, int_day1, int_day2);
		}
		else if (year2 < year1)
		{
			totalDays = calculateDays(int_secondMonth, int_firstMonth, int_year2, int_year1, int_day2, int_day1);
		}
		else if (year2 == year1)
		{
			if (int_firstMonth < int_secondMonth)
			{
				totalDays = calculateDays(int_firstMonth, int_secondMonth, int_year1, int_year2, int_day1, int_day2);
			}
			else if (int_secondMonth < int_firstMonth)
			{
				totalDays = calculateDays(int_secondMonth, int_firstMonth, int_year2, int_year1, int_day2, int_day1);
			}
			else if (int_firstMonth == int_secondMonth)
			{
				if (int_day1 > int_day2)
				{
					totalDays = int_day1 - int_day2;
				}
				else if (int_day1 < int_day2)
				{
					totalDays = int_day2 - int_day1;
				}
				else
				{
					totalDays = 0;
				}
			}
		}
		// Checks whether "day" or "days" should be used, and then outputs the restult
		if (totalDays == 1)
		{
			echo "There is " << totalDays << " day between " << returnDate(int_day1, int_year1, month1) << ", " << month1 << " " << int_day1 << ", " << int_year1 << " and " << returnDate(int_day2, int_year2, month2) << ", " << month2 << " " << int_day2 << ", " << int_year2 << "." << endl << endl;
		}
		else
		{
			echo "There are " << totalDays << " days between " << returnDate(int_day1, int_year1, month1) << ", " << month1 << " " << int_day1 << ", " << int_year1 << " and " << returnDate(int_day2, int_year2, month2) << ", " << month2 << " " << int_day2 << ", " << int_year2 << "." << endl << endl;
		}
		echo "Would you like to perform the operation again? Enter 1 for yes, or 0 for no: ";
		do
		{
			cin >> selection;
			if (selection < 0 || selection > 1)
			{
				echo "Invalid Selection, Try again: ";
			}
		} while (selection < 0 || selection > 1);


	return 0;
}

function checkMonth($a)
{
	string monthLower = monthToLower(a);
	// Checks the new lowercase string against a list of valid months
	if (monthLower != "january" && monthLower != "february" && monthLower != "march" && monthLower != "april" && monthLower != "may" && monthLower != "june"
		&& monthLower != "july" && monthLower != "august" && monthLower != "september" && monthLower != "october" && monthLower != "november" && monthLower != "december")
	{
		echo "INVALID MONTH\n";
		return -1;
	}
		return 0;
}

function checkYear($a)
{
	// Checks to make sure all characters are valid numbers
	for (int i = 0; i < a.length(); i++)
	{
		if (a[i] != '0' && a[i] != '1' && a[i] != '2' && a[i] != '3' && a[i] != '4' && a[i] != '5' && a[i] != '6' && a[i] != '7' && a[i] != '8' && a[i] != '9')
		{
			echo "INVALID YEAR\n";
			return -1;
		}
	}
	// If the year is composed of valid numbers, turns it into an int
	int year = atoi(a.substr(0, a.length()).c_str());
	// Checks to make sure the year is not less than 1582
	if (year < YEAR1)
	{
		echo "INVALID YEAR\n";
		return -1;
	}
	return year;
}

function checkDay($a, $b, $c)
{
	// Turns the day into an int
	string monthLower = monthToLower(b);
	int day = atoi(a.substr(0, a.length() - 1).c_str());
	int dayMax = 0;
	// Gives each month the correct amount of days
	if (monthLower == "september" || monthLower == "june" || monthLower == "april" || monthLower == "november")
	{
		dayMax = MONTH30;
	}
	else if (monthLower == "february")
	{
		dayMax = checkLeapYear(c);
	}
	else
	{
		dayMax = MONTH31;
	}
	// Checks to make sure the entered day is within the valid range
	if (day <= 0 || day > dayMax)
	{
		echo "INVALID DAY\n";
		return -1;
	}
	return day;
}

function monthDependentDays($a, $b)
{
	// Determines how many days are in the different months
	int numDays;
	numDays = 0;
	if (a == 8 || a == 3 || a == 5 || a == 10)
	{
		numDays = MONTH30;
	}
	else if (a == 1 && checkLeapYear(b) == LEAPFEBRUARY)
	{
		numDays = LEAPFEBRUARY;
	}
	else if (a == 1)
	{
		numDays = FEBRUARY;
	}
	else
	{
		numDays = MONTH31;
	}
	return (numDays);
}

function monthToLower($a)
{
	// Makes the month all lowercase
	string monthLower;
	for (int i = 0; i < a.length(); i++)
	{
		monthLower += tolower(a[i]);
	}
	return (monthLower);
}

function checkLeapYear($a)
{
	// Checks for leap years
	int februaryDays;
	if (a % LEAPCENTURYTEST != 0)
	{
		if (a % LEAPYEAR == 0)
		{
			februaryDays = LEAPFEBRUARY;
			return (februaryDays);
		}
	}
	else
	{
		if (a % LEAPCENTURY == 0)
		{
			februaryDays = LEAPFEBRUARY;
			return (februaryDays);
		}
	}
	februaryDays = FEBRUARY;
	return (februaryDays);
}

function monthCode($a)
{
	//Assigns a code number to each month for counting use
	int monthCode;
	if (a == "january")
	{
		monthCode = 0;
	}
	else if (a == "february")
	{
		monthCode = 1;
	}
	else if (a == "march")
	{
		monthCode = 2;
	}
	else if (a == "april")
	{
		monthCode = 3;
	}
	else if (a == "may")
	{
		monthCode = 4;
	}
	if (a == "june")
	{
		monthCode = 5;
	}
	else if (a == "july")
	{
		monthCode = 6;
	}
	else if (a == "august")
	{
		monthCode = 7;
	}
	else if (a == "september")
	{
		monthCode = 8;
	}
	else if (a == "october")
	{
		monthCode = 9;
	}
	else if (a == "november")
	{
		monthCode = 10;
	}
	else if (a == "december")
	{
		monthCode = 11;
	}
	return monthCode;
}

function returnDate($day, $year, $string_month)
{
	// Finds the correct day of the week for dates, by comparing them with February 29, 2016
	string_month = monthToLower(string_month);
	int month = monthCode(string_month);
	int dayNumber = 0, dayCode = 0;
	const int DEFAULTMONTH = 1, DEFAULTDAY = 1, DEFAULTYEAR = 2016;
	if (year < DEFAULTYEAR)
	{
		dayNumber = calculateDays(month, DEFAULTMONTH, year, DEFAULTYEAR, day, DEFAULTDAY);
	}
	else if (DEFAULTYEAR < year)
	{
		dayNumber = calculateDays(DEFAULTMONTH, month, DEFAULTYEAR, year, DEFAULTDAY, day);
	}
	else if (DEFAULTYEAR == year)
	{
		if (month < DEFAULTMONTH)
		{
			dayNumber = calculateDays(month, DEFAULTMONTH, year, DEFAULTYEAR, day, DEFAULTDAY);
		}
		else if (DEFAULTMONTH < month)
		{
			dayNumber = calculateDays(DEFAULTMONTH, month, DEFAULTYEAR, year, DEFAULTDAY, day);
		}
		else if (DEFAULTMONTH == month)
		{

			if (day > DEFAULTDAY)
			{
				dayNumber = day -1;
			}
			else
			{
				dayNumber = 0;
			}
		}
	}
	dayCode = dayNumber % DAYSPERWEEK;
	switch (dayCode)
	{
	case 0:
		return "Monday";
	case 1:
		return "Tuesday";
	case 2:
		return "Wednesday";
	case 3:
		return "Thursday";
	case 4:
		return "Friday";
	case 5:
		return "Saturday";
	case 6:
		return "Sunday";
	}
}

function calculateDays($month1, $month2, $year1, $year2, $day1, $day2)
{
	// Hands down the most painful/awesome piece of code in the whole program... Let's just say it took awhile to make and I'm very proud of it...
	int Days = 0;
	Days = monthDependentDays(month1, year1) - day1;
	month1++;
	do
	{
		do
		{
			if (year1 == year2 && month1 == month2)
			{
				Days += day2;
				break;
			}
			else
			{
				Days += monthDependentDays(month1, year1);
			}
			month1++;
		} while (month1 <= 11);

		month1 = 0;
		year1++;
	} while (year1 <= year2);
	return (Days);


?>