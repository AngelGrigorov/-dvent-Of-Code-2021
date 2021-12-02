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

	for scanner.Scan() {
		command := strings.Split(scanner.Text(), " ")
		intnumber, _ := strconv.Atoi(command[1])
		if command[0] == "forward" {
			position += intnumber
		} else if command[0] == "down" {
			depth += intnumber
		} else if command[0] == "up" {
			depth -= intnumber
		}

	}

	fmt.Println(position * depth)
}
