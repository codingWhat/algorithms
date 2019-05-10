package main

import (
	"fmt"
	"github.com/pkg/errors"
	"math"
	"reflect"
)

func main() {
	arr, _ := NewDynamicArray(20)
	i := 0
	len1 := 100000
	for i < len1 {
		_, err := arr.Insert(i)
		//fmt.Println(n)
		if err != nil {
			fmt.Println(err)
			fmt.Println(i)
			return
		}
		i++
	}
	return
	for i=0; i < len1; i++  {
		i2 := arr.getArray()[i].(int)
		fmt.Println(i2)
	}
}

type DynamicArray struct {
	length int
	arr    []interface{}
	dataType   string
	count  int
	minWaterLevel int
}

func NewDynamicArray(len int) (*DynamicArray, error) {

	if len > 0 && len < math.MaxInt16{
		return &DynamicArray{length:len, arr:make([]interface{}, len)}, nil
	}
	return nil, errors.New("错误参数!")
}


func (d *DynamicArray) Insert(item interface{}) (int, error){

	dataType := reflect.TypeOf(item).Name()
	if d.count == 0 {
		d.dataType = dataType
	}
	if d.dataType != dataType{
		return -1, errors.New("错误数据类型")
	}

	if d.checkIsFull() {
		if !d.checkMaxCapacity(2*d.count) {
			return -1, errors.New("超出容量限制")
		}
		nArr := make([]interface{}, 2 * d.count)
		for key, value := range d.arr {
			nArr[key] = value
		}
		d.arr = nArr
		d.length = 2 *d.count
	}
	d.arr[d.count]= item
	d.count++

	return d.count, nil
}

func (d *DynamicArray) checkMaxCapacity(len int) bool{
	return len > 0 && len < math.MaxInt16
}
func (d *DynamicArray) checkIsFull() bool {
	return d.count >= d.length
}

func (d *DynamicArray) Remove(index int)(interface{}, error){
	if d.count == 0 {
		return nil, errors.New("空数组,无法删除!")
	}
	//删除操作
	for key := range d.arr {
		if index == key{
			d.arr = append(d.arr[:index], d.arr[index+1:]...)
			d.count--
			break
		}
	}
	//检测是否低于最低水位线
	if len(d.arr) < d.minWaterLevel {
		//缩容
		nArr := make([]interface{}, d.minWaterLevel)
		for key, value := range d.arr {
			nArr[key] = value
		}
		d.arr = nArr
	}
	d.length = d.count
	return d.arr[index], nil
}

func (d *DynamicArray) getArray() []interface{} {
	return d.arr
}
