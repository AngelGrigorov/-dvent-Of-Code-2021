package main

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
)

func main() {
	file, _ := os.Open("dayOneInput.txt")
	defer file.Close()
	scanner := bufio.NewScanner(file)
	count := 0
	lastDepthMeasurement := 0
	for scanner.Scan() {
		depthMeasurement, _ := strconv.Atoi(scanner.Text())
		if lastDepthMeasurement != 0 && depthMeasurement > lastDepthMeasurement {
			count++
		}
		lastDepthMeasurement = depthMeasurement
	}
	fmt.Println(count)
}
