package main

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
	"strings"
)

func main() {
	file, _ := os.Open("Day 2 - Input.txt")
	defer file.Close()
	scanner := bufio.NewScanner(file)
	position := 0
	depth := 0
	aim := 0

	for scanner.Scan() {
		command := strings.Split(scanner.Text(), " ")
		intnumber, _ := strconv.Atoi(command[1])
		if command[0] == "forward" {
			position += intnumber
			if aim > 0 {
				depth += intnumber * aim
			}
		} else if command[0] == "down" {
			aim += intnumber
		} else if command[0] == "up" {
			aim -= intnumber
		}

	}

	fmt.Println(position * depth)
}
