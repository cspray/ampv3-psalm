# Amp v3 and Psalm Support

Amp v3 is currently only supported in development versions of Psalm. This 
repo demonstrates how Psalm `dev-master` does not currently recognize 
`@psalm-assert` annotations in the `vendor/` directory.

## Installation

This repo is not expected to be installed locally. Please review the 
source code and then review the output of the provided GitHub Action.

## Overview

There is a single class that implements 2 public static methods; one using `webmozart/assert` 
to verify the type of a mixed value, and the other using the same `psalm-assert` annotation as
webmozart but in a private method of the class. The output of the GitHub Action shows there are 
2 errors in the method using webmozart, demonstrating that the `psalm-assert` annotations are 
not probably being recognized by Psalm.